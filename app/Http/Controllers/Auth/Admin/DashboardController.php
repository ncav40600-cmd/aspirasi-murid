<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\AnonymousMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\AspirasiSelesaiNotification;
use App\Mail\AspirasiDitolakNotification;

class DashboardController extends Controller
{
    public function index()
    {
        $total_aspirasi = Aspirasi::count();
        $baru     = Aspirasi::where('status','Baru')->count();
        $diproses = Aspirasi::where('status','Diproses')->count();
        $selesai  = Aspirasi::where('status','Selesai')->count();
        $ditolak  = Aspirasi::where('status','Ditolak')->count();

        try {
            $kategoriStats = DB::table('aspirasi')
                ->leftJoin('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
                ->select(
                    DB::raw("COALESCE(kategori.keterangan,'Tidak ada kategori') as nama_kategori"),
                    DB::raw("COUNT(*) as total")
                )
                ->groupBy('kategori.keterangan')
                ->orderBy('total','desc')
                ->get();

            if($kategoriStats->isEmpty()){
                $kategoriLabels = ['Belum ada data'];
                $kategoriValues = [0];
            } else {
                $kategoriLabels = $kategoriStats->pluck('nama_kategori')->toArray();
                $kategoriValues = $kategoriStats->pluck('total')->toArray();
            }

        } catch (\Exception $e) {
            Log::error('Error kategori stats: '.$e->getMessage());
            $kategoriLabels = ['Error'];
            $kategoriValues = [0];
        }

        $aspirasi_terbaru = DB::table('aspirasi')
            ->leftJoin('users','aspirasi.user_id','=','users.id')
            ->leftJoin('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
            ->orderByRaw("CASE WHEN aspirasi.status = 'Selesai' THEN 1 ELSE 0 END ASC")
            ->orderBy('aspirasi.id_aspirasi','desc')
            ->select(
                'aspirasi.*',
                'aspirasi.is_anonymous',
                'aspirasi.email_siswa',
                DB::raw("COALESCE(users.name, users.username, '') as full_name"),
                'users.username as username',
                'users.nis',
                'kategori.keterangan as nama_kategori'
            )
            ->get();

        $aspirasi_terbaru->transform(function ($item) {
            if (!empty($item->is_anonymous)) {
                $item->display_name = 'Anonim';
                $item->display_nis = '-';
                $item->display_email = 'Anonim';
            } else {
                $item->display_name = $item->full_name ?: ($item->username ?? 'Pengirim');
                $item->display_nis = $item->nis ?: '-';
                $item->display_email = $item->email_siswa ?: '-';
            }
            return $item;
        });

        $anonymous_messages = AnonymousMessage::latest()->limit(10)->get();

        return view('admin.dashboard', compact(
            'total_aspirasi','baru','diproses','selesai','ditolak',
            'aspirasi_terbaru','kategoriLabels','kategoriValues','anonymous_messages'
        ));
    }

    public function aspirasi(Request $request)
    {
        $bulan = $request->bulan ?: date('n');
        $tahun = $request->tahun ?: date('Y');

        $query = DB::table('aspirasi')
            ->leftJoin('users','aspirasi.user_id','=','users.id')
            ->leftJoin('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
            ->select(
                'aspirasi.*',
                'users.username as full_name',
                'users.nis',
                'kategori.keterangan as nama_kategori'
            );

        if ($request->status) {
            $query->where('aspirasi.status', $request->status);
        }

        $query->whereMonth('aspirasi.created_at', $bulan);
        $query->whereYear('aspirasi.created_at', $tahun);

        if ($request->tanggal) {
            $query->whereDate('aspirasi.created_at', $request->tanggal);
        }

        if ($request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('users.name', 'like', "%$search%")
                  ->orWhere('users.nis', 'like', "%$search%")
                  ->orWhere('kategori.keterangan', 'like', "%$search%");
            });
        }

        $aspirasi = $query->orderBy('aspirasi.id_aspirasi','desc')->get();

        $aspirasi->transform(function ($item) {
            if (!empty($item->is_anonymous)) {
                $item->display_name = 'Anonim';
                $item->display_email = 'Anonim';
                $item->display_nis = '-';
            } else {
                $item->display_name = $item->full_name ?? 'Pengirim';
                $item->display_email = $item->email_siswa ?? '-';
                $item->display_nis = $item->nis ?? '-';
            }
            return $item;
        });

        return view('admin.aspirasi', compact('aspirasi'));
    }

    public function show($id)
    {
        $aspirasi = DB::table('aspirasi')
            ->leftJoin('users','aspirasi.user_id','=','users.id')
            ->leftJoin('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
            ->where('aspirasi.id_aspirasi',$id)
            ->select(
                'aspirasi.*',
                'users.name as full_name',
                'users.email as user_email',
                'users.nis',
                'users.kelas',
                DB::raw("COALESCE(kategori.keterangan,'Tidak ada kategori') as nama_kategori")
            )
            ->first();

        if(!$aspirasi){
            return back()->with('error','Aspirasi tidak ditemukan');
        }

        if (!empty($aspirasi->is_anonymous)) {
            $aspirasi->display_name = 'Anonim';
            $aspirasi->display_email = 'Anonim';
            $aspirasi->display_nis = '-';
        } else {
            $aspirasi->display_name = $aspirasi->full_name ?? 'Pengirim';
            $aspirasi->display_email = $aspirasi->email_siswa ?? $aspirasi->user_email ?? '-';
            $aspirasi->display_nis = $aspirasi->nis ?? '-';
        }

        return view('admin.show', compact('aspirasi'));
    }

    public function proses($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->status = 'Diproses';
        $aspirasi->save();

        return back()->with('success','Status berhasil diubah ke Diproses');
    }

    public function selesai($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->status = 'Selesai';
        $aspirasi->save();

        try {
            if (!empty($aspirasi->email_siswa)) {
                $detail = $this->getDetailAspirasi($id);
                if ($detail) {
                    Mail::to($aspirasi->email_siswa)
                        ->send(new AspirasiSelesaiNotification($detail,null));
                }
            }
        } catch (\Exception $e) {
            Log::error('Email gagal: '.$e->getMessage());
        }

        return back()->with('success','Aspirasi selesai');
    }

    public function umpanBalik(Request $request,$id)
    {
        $request->validate([
            'umpan_balik'=>'required|string|max:2000'
        ]);

        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->status = 'Selesai';
        $aspirasi->umpan_balik = $request->umpan_balik;
        $aspirasi->save();

        try {
            $detail = $this->getDetailAspirasi($id);
            if ($detail && !empty($detail->email_siswa)) {
                Mail::to($detail->email_siswa)
                    ->send(new AspirasiSelesaiNotification($detail,$request->umpan_balik));
            }
        } catch (\Exception $e) {
            Log::error('Email gagal: '.$e->getMessage());
        }

        return back()->with('success','Tanggapan berhasil disimpan');
    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'tolak_alasan'=>'required|string|max:2000'
        ]);

        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->status = 'Ditolak';
        $aspirasi->umpan_balik = $request->tolak_alasan;
        $aspirasi->save();

        try {
            $detail = $this->getDetailAspirasi($id);
            if ($detail && !empty($detail->email_siswa)) {
                Mail::to($detail->email_siswa)
                    ->send(new AspirasiDitolakNotification($detail,$request->tolak_alasan));
            }
        } catch (\Exception $e) {
            Log::error('Email gagal: '.$e->getMessage());
        }

        return back()->with('success','Aspirasi ditolak');
    }

    private function getDetailAspirasi($id)
    {
        return DB::table('aspirasi')
            ->join('users','aspirasi.user_id','=','users.id')
            ->leftJoin('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
            ->where('aspirasi.id_aspirasi',$id)
            ->select(
                'aspirasi.*',
                'users.name as full_name',
                'users.nis',
                DB::raw("COALESCE(kategori.keterangan,'Tidak ada kategori') as nama_kategori")
            )
            ->first();
    }
}