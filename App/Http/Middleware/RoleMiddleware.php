<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // 🔒 Cek login dulu
        if (!session()->has('user_id')) {
            return redirect()
                ->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // 🎭 Ambil role dari session
        $userRole = session('role');

        // ❗ Jika role kosong / tidak ada
        if (!$userRole) {
            return redirect()
                ->route('login')
                ->with('error', 'Role tidak ditemukan.');
        }

        // 🚫 Cek apakah role diizinkan
        if (!in_array($userRole, $roles)) {
            return redirect()
                ->route('login')
                ->with('error', 'Akses ditolak.');
        }

        // ✅ Lanjut request (ini WAJIB, kalau error biasanya bukan dari sini)
        return $next($request);
    }
}