<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $login = trim($request->login);

        // Siswa login menggunakan NIS
        $user = DB::table('users')
            ->where('role', 'siswa')
            ->where('nis', $login)
            ->first();

        // Admin tetap login menggunakan username
        if (!$user) {
            $user = DB::table('users')
                ->where('role', 'admin')
                ->where('username', $login)
                ->first();
        }

        if (!$user) {
            return back()
                ->withErrors(['login' => 'NIS/Username tidak ditemukan.'])
                ->with('login_error', 'NIS/Username tidak ditemukan.')
                ->onlyInput('login');
        }

        // Cek password dengan hash
        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'Password salah.'])
                ->with('login_error', 'Password salah.')
                ->onlyInput('login');
        }

        session([
            'user_id' => $user->id,
            'username' => $user->username,
            'full_name' => $user->name ?? $user->username,
            'role' => $user->role,
            'nis' => $user->nis,
            'kelas' => $user->kelas ?? '',
        ]);

        // Rekam sesi login internal (untuk audit dan notifikasi tanpa memaparkan data ke admin)
        DB::table('sessions')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'payload' => '',
            'last_activity' => now()->timestamp,
        ]);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('siswa.dashboard');
    }
}