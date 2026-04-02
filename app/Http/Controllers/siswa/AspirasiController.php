<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AspirasiController extends Controller
{
    // Method index, create, show...

    public function index()
    {
        $userId = session('user_id');

        $aspirasi = DB::table('aspirasi')
            ->join('kategori', 'aspirasi.id_kategori', '=', 'kategori.id_kategori')
            ->select('aspirasi.*', 'kategori.keterangan as nama_kategori')
            ->where('aspirasi.user_id', $userId)
            ->orderBy('aspirasi.id_aspirasi', 'desc')
            ->get();

        return view('siswa.dashboard', compact('aspirasi'));
    }

    // Tampilkan form pembuatan aspirasi
    public function create()
    {
        $kategori = DB::table('kategori')->orderBy('keterangan')->get();
        $user = DB::table('users')->where('id', session('user_id'))->first();
        return view('siswa.create', compact('kategori', 'user'));
    }

    // Tampilkan detail aspirasi milik user
    public function show($id)
    {
        $userId = session('user_id');

        $aspirasi = DB::table('aspirasi')
            ->join('kategori', 'aspirasi.id_kategori', '=', 'kategori.id_kategori')
            ->join('users', 'aspirasi.user_id', '=', 'users.id')
            ->select(
                'aspirasi.*',
                'kategori.keterangan as nama_kategori',
                'aspirasi.foto as foto_aspirasi',
                'users.username as full_name',
                'users.email as user_email'
            )
            ->where('aspirasi.user_id', $userId)
            ->where('aspirasi.id_aspirasi', $id)
            ->first();

        if (!$aspirasi) {
            return redirect()->route('siswa.dashboard')->with('error', 'Aspirasi tidak ditemukan.');
        }

        // Log file name for debugging asset path
        Log::info('Siswa show foto_aspirasi', ['id' => $id, 'foto' => $aspirasi->foto_aspirasi ?? null]);

        return view('siswa.show', compact('aspirasi'));
    }

    // Form edit aspirasi milik user
    public function edit($id)
    {
        $userId = session('user_id');

        $aspirasi = Aspirasi::where('user_id', $userId)
            ->where('id_aspirasi', $id)
            ->first();

        if (!$aspirasi) {
            return redirect()->route('siswa.dashboard')->with('error', 'Aspirasi tidak ditemukan.');
        }

        $kategori = DB::table('kategori')->orderBy('keterangan')->get();
        $user = DB::table('users')->where('id', session('user_id'))->first();
        return view('siswa.edit', compact('aspirasi', 'kategori', 'user'));
    }

    // Hapus aspirasi milik user
    public function destroy($id)
    {
        $aspirasi = Aspirasi::where('user_id', session('user_id'))
            ->where('id_aspirasi', $id)
            ->first();

        if (!$aspirasi) {
            return redirect()->route('siswa.dashboard')->with('error', 'Aspirasi tidak ditemukan.');
        }

        // Hapus file foto jika ada
        if ($aspirasi->foto) {
            Storage::disk('public')->delete('aspirasi/' . $aspirasi->foto);
        }

        $aspirasi->delete();

        return redirect()->route('siswa.dashboard')->with('success', 'Aspirasi berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $isAnonymous = $request->has('is_anonymous');

        $rules = [
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'keterangan'  => 'required|string|max:500',
            'lokasi'      => 'required|string|max:100',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];

        if (!$isAnonymous) {
            $rules['email_siswa'] = 'required|email|max:255';
        } else {
            $rules['email_siswa'] = 'nullable|email|max:255';
        }

        $request->validate($rules);

        $nama_foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('aspirasi', $nama_foto, 'public');
        }

        $user = DB::table('users')->where('id', session('user_id'))->first();

        $emailSiswa = $request->email_siswa;

        // Jika anonim, tetap rekam email siswa sendiri untuk notifikasi, tapi pada admin akan "Anonim".
        if ($isAnonymous) {
            $emailSiswa = $user->email;
        } elseif (!$emailSiswa) {
            $emailSiswa = $user->email;
        }

        // Pastikan session('user_id') tersedia atau ganti dengan auth()->id()
        Aspirasi::create([
            'user_id'     => session('user_id'), 
            'id_kategori' => $request->id_kategori,
            'keterangan'  => $request->keterangan,
            'lokasi'      => $request->lokasi,
            'email_siswa' => $emailSiswa,
            'foto'        => $nama_foto, 
            'status'      => 'Baru',
            'is_anonymous' => $isAnonymous,
        ]);

        return redirect()->route('siswa.dashboard')
            ->with('success', '✅ Aspirasi berhasil diajukan!');
    }

    public function update(Request $request, $id)
    {
        $aspirasi = Aspirasi::where('user_id', session('user_id'))
            ->where('id_aspirasi', $id)
            ->firstOrFail();

        $user = DB::table('users')->where('id', session('user_id'))->first();

        if ($aspirasi->status !== 'Baru') {
            return redirect()->route('siswa.dashboard')->with('error', 'Aspirasi sudah diproses dan tidak bisa diubah.');
        }

        $isAnonymous = $request->has('is_anonymous');

        $rules = [
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'keterangan'  => 'required|string|max:500',
            'lokasi'      => 'required|string|max:100',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];

        if (!$isAnonymous) {
            $rules['email_siswa'] = 'required|email|max:255';
        } else {
            $rules['email_siswa'] = 'nullable|email|max:255';
        }

        $request->validate($rules);

        // Tampung data update
        $dataUpdate = [
            'id_kategori' => $request->id_kategori,
            'keterangan'  => $request->keterangan,
            'lokasi'      => $request->lokasi,
            'is_anonymous' => $isAnonymous,
        ];

        if ($isAnonymous) {
            $dataUpdate['email_siswa'] = $user->email;
        } else {
            $dataUpdate['email_siswa'] = $request->email_siswa ?? $aspirasi->email_siswa;
        }

        if ($request->hasFile('foto')) {
            // 1. Hapus foto lama jika ada
            if ($aspirasi->foto) {
                Storage::disk('public')->delete('aspirasi/' . $aspirasi->foto);
            }

            // 2. Upload foto baru
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('aspirasi', $nama_foto, 'public');
            
            // 3. Masukkan nama foto baru ke array update
            $dataUpdate['foto'] = $nama_foto;
        }

        $aspirasi->update($dataUpdate);

        return redirect()->route('siswa.dashboard')->with('success', '✅ Aspirasi berhasil diperbarui!');
    }
}