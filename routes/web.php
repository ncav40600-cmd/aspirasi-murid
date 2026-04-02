<?php

/**
 * Pastikan baris impor facade Route ini ada di paling atas file web.php
 * untuk menghilangkan error "Class 'Route' is not imported" di VS Code.
 */
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Siswa\AspirasiController as SiswaAspirasiController;

/**
 * Root Redirect
 */
Route::get('/', function () {
    return redirect()->route('login');
});

/**
 * GUEST ROUTES
 * Rute yang hanya bisa diakses sebelum user login (middleware guest)
 */
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

/**
 * SHARED AUTH ROUTES
 * Logout diletakkan di luar grup role agar bisa diakses baik oleh admin maupun siswa
 */
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    // Opsional: rute GET logout untuk handle redirect yang tidak sengaja
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.get');
});

/**
 * ADMIN ROUTES
 * Menggunakan prefix 'admin' dan name 'admin.' (contoh: admin.dashboard)
 */
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Manajemen Aspirasi
    // Dibuat dua rute agar link 'admin.aspirasi' dan 'admin.aspirasi.index' keduanya valid
    Route::get('/aspirasi', [DashboardController::class, 'aspirasi'])->name('aspirasi');
    Route::get('/aspirasi/list', [DashboardController::class, 'aspirasi'])->name('aspirasi.index'); 
    
    // Detail & Show
    Route::get('/aspirasi/{id}', [DashboardController::class, 'show'])->name('show');
    Route::get('/aspirasi/detail/{id}', [DashboardController::class, 'show'])->name('aspirasi.show');
    
    // Operasi Status (Gunakan POST/PATCH)
    Route::post('/aspirasi/{id}/proses', [DashboardController::class, 'proses'])->name('aspirasi.proses');
    Route::post('/aspirasi/{id}/tolak', [DashboardController::class, 'tolak'])->name('aspirasi.tolak');
    Route::post('/aspirasi/{id}/selesai', [DashboardController::class, 'selesai'])->name('aspirasi.selesai');
    Route::post('/aspirasi/{id}/umpan-balik', [DashboardController::class, 'umpanBalik'])->name('aspirasi.umpan-balik');
    
    // CRUD User Management
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/import', [UserController::class, 'importForm'])->name('users.import.form');
    Route::post('users/import', [UserController::class, 'import'])->name('users.import');
    Route::post('users/{id}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset_password');

    // CRUD Kategori menggunakan Resource
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/{id?}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});

/**
 * SISWA ROUTES
 * Menggunakan prefix 'siswa' dan name 'siswa.'
 */
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    
    // Dashboard/Riwayat Siswa
    Route::get('/dashboard', [SiswaAspirasiController::class, 'index'])->name('dashboard');
    
    // CRUD Aspirasi untuk Siswa
    Route::get('/aspirasi/create', [SiswaAspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi', [SiswaAspirasiController::class, 'store'])->name('aspirasi.store');
    Route::get('/aspirasi/{id}', [SiswaAspirasiController::class, 'show'])->name('aspirasi.show');
    Route::get('/aspirasi/{id}/edit', [SiswaAspirasiController::class, 'edit'])->name('aspirasi.edit');
    Route::put('/aspirasi/{id}', [SiswaAspirasiController::class, 'update'])->name('aspirasi.update');
    Route::delete('/aspirasi/{id}', [SiswaAspirasiController::class, 'destroy'])->name('aspirasi.destroy');
});