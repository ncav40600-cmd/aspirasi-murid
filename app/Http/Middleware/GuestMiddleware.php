<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (session()->has('user_id')) {
            // Jika sudah login, redirect ke dashboard sesuai role
            $role = session('role');
            
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('siswa.dashboard');
            }
        }

        return $next($request);
    }
}