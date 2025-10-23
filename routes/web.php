<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BeritaController; // <-- IMPORT BERITA CONTROLLER
use App\Http\Controllers\Admin\DashboardController; // <-- IMPORT DASHBOARD CONTROLLER (akan kita buat)

// Halaman Landing Page (index.php lama Anda)
Route::get('/', function () {
    return view('welcome'); // Ini adalah 'welcome.blade.php'
});

// --- GRUP ROUTE ADMIN ---
// Semua route di dalam grup ini:
// 1. Hanya bisa diakses oleh user yang sudah login (middleware('auth'))
// 2. Punya awalan URL /admin (prefix('admin'))
// 3. Punya nama route 'admin.' (name('admin.'))
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Route untuk Dashboard Admin (akan kita buat)
    // URL: /admin/dashboard
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk CRUD Berita
    // Ini otomatis membuat URL:
    // - /admin/berita (index)
    // - /admin/berita/create (create)
    // - /admin/berita (store)
    // - /admin/berita/{berita} (show)
    // - /admin/berita/{berita}/edit (edit)
    // - /admin/berita/{berita} (update)
    // - /admin/berita/{berita} (destroy)
    Route::resource('berita', BeritaController::class);

    // Nanti Anda bisa tambahkan ini untuk destinasi:
    // Route::resource('destinasi', DestinasiController::class);
});
// ------------------------


// Route untuk Profile (Bawaan Breeze, biarkan saja)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; // Ini adalah route login, register, logout