<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\AspirasiSelesaiNotification;
use Exception;

class AspirasiController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('aspirasi')
            ->join('users', 'aspirasi.user_id', '=', 'users.id')
            ->join('kategori', 'aspirasi.id_kategori', '=', 'kategori.id_kategori')
            ->select(
                'aspirasi.*',
                'users.name as full_name',
                'users.email as email_siswa',
                'users.nisn as nis',
                'kategori.keterangan as nama_kategori',
                'aspirasi.is_anonymous'
            );

        // filter status
        if ($request->status) {
            $query->where('aspirasi.status', $request->status);
        }

        // filter bulan - pastikan tahun juga dipilih atau gunakan tahun sekarang
        if ($request->bulan) {
            $tahun = $request->tahun ?: date('Y');
            $query->whereMonth(DB::raw("DATE_FORMAT(aspirasi.created_at, '%m')"), $request->bulan)
                  ->whereYear(DB::raw("DATE_FORMAT(aspirasi.created_at, '%Y')"), $tahun);
        }

        // filter tahun saja
        if ($request->tahun && !$request->bulan) {
            $query->whereYear(DB::raw("DATE_FORMAT(aspirasi.created_at, '%Y')"), $request->tahun);
        }

        // filter tanggal spesifik - convert dari ISO format yang dikirim Katalon
        if ($request->tanggal) {
            $selectedDate = $request->tanggal; // Format: YYYY-MM-DD
            $query->whereDate(DB::raw("DATE_FORMAT(aspirasi.created_at, '%Y-%m-%d')"), $selectedDate);
        }

        $aspirasi = $query
            ->orderBy('aspirasi.created_at', 'desc')
            ->get();

        // Handle anonymous: admin lihat anon, sistem tetap tahu email asli (user_email)
        foreach ($aspirasi as $item) {
            if (isset($item->is_anonymous) && $item->is_anonymous) {
                $item->display_name = 'Anonim';
                $item->display_email = 'Anonim';
                $item->display_nis = '-';
            } else {
                $item->display_name = $item->full_name;
                $item->display_email = $item->email_siswa;
                $item->display_nis = $item->nis;
            }
        }

        return view('admin.aspirasi.index', compact('aspirasi'));
    }

    public function show($id)
    {
        $aspirasi = $this->getDetailAspirasi($id);

        if (!$aspirasi) {
            return redirect()->route('admin.aspirasi.index')->with('error', 'Aspirasi tidak ditemukan.');
        }

        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    public function proses($id)
    {
        $aspirasi = Aspirasi::where('id_aspirasi', $id)->firstOrFail();
        $aspirasi->status = 'Diproses';
        $aspirasi->save();

        return redirect()->back()->with('success', '✅ Status berhasil diubah ke Diproses.');
    }

    public function umpanBalik(Request $request, $id)
    {
        $request->validate([
            'umpan_balik' => 'required|string|max:2000',
        ]);

        try {

            $aspirasi = Aspirasi::where('id_aspirasi', $id)->firstOrFail();
            $aspirasi->umpan_balik = $request->umpan_balik;
            $aspirasi->status = 'Selesai';
            $aspirasi->save();

            $detailAspirasi = $this->getDetailAspirasi($id);
            $notifyEmail = $detailAspirasi->email_siswa ?? $detailAspirasi->user_email ?? null;

            if ($detailAspirasi && $notifyEmail) {
                Mail::to($notifyEmail)->send(
                    new AspirasiSelesaiNotification($detailAspirasi, $request->umpan_balik)
                );
            }

            return redirect()->back()->with('success', '✅ Tanggapan berhasil dikirim & status aspirasi diselesaikan.');

        } catch (Exception $e) {

            Log::error('Email Error: ' . $e->getMessage());

            return redirect()->back()->with('warning', '⚠️ Data disimpan, tapi email gagal terkirim.');
        }
    }

    private function getDetailAspirasi($id)
    {
        $aspirasi = DB::table('aspirasi')
            ->join('users', 'aspirasi.user_id', '=', 'users.id')
            ->join('kategori', 'aspirasi.id_kategori', '=', 'kategori.id_kategori')
            ->where('aspirasi.id_aspirasi', $id)
            ->select(
                'aspirasi.*',
                'aspirasi.foto as foto_aspirasi',
                'users.name as full_name',
                'users.email as user_email',
                'kategori.keterangan as nama_kategori',
                'aspirasi.is_anonymous'
            )
            ->first();

        if ($aspirasi) {
            if (isset($aspirasi->is_anonymous) && $aspirasi->is_anonymous) {
                $aspirasi->display_name = 'Anonim';
                $aspirasi->display_email = 'Anonim';
                $aspirasi->display_nis = '-';
                $aspirasi->email_siswa = $aspirasi->email_siswa ?? $aspirasi->user_email;
            } else {
                $aspirasi->display_name = $aspirasi->full_name;
                $aspirasi->display_email = $aspirasi->email_siswa ?? $aspirasi->user_email;
                $aspirasi->display_nis = $aspirasi->nis;
                $aspirasi->email_siswa = $aspirasi->email_siswa ?? $aspirasi->user_email;
            }
        }

        return $aspirasi;
    }
}