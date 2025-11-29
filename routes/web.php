<?php

use Illuminate\Support\Facades\Route;

// Import semua Controller yang kita butuhkan
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DestinasiController;
use Illuminate\Support\Facades\DB; // <-- PASTIKAN INI ADA
use App\Http\Controllers\PublicWisataController;
use App\Http\Controllers\PublicKebudayaanController;
use App\Http\Controllers\PublicGaleriController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\PublicInformasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute Halaman Utama (Homepage)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute Halaman Profil Desa
Route::get('/profil-desa', function () {
    return view('profil-desa');
})->name('profil.desa');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// --- GRUP ROUTE ADMIN ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // --- ROUTE UNTUK DASHBOARD ---
    Route::get('/dashboard', function () {
        
        // Gunakan 'destinasi' (TANPA 's')
        $total_destinasi = DB::table('destinasi')->count();
        
        // --- PERBAIKAN: Gunakan 'beritas' (DENGAN 's') ---
        $total_berita = DB::table('beritas')->count();
        
        return view('admin.dashboard', [
            'total_destinasi' => $total_destinasi,
            'total_berita' => $total_berita,
        ]);
    })->name('dashboard');
    // ---------------------------------

    Route::resource('berita', BeritaController::class);
    Route::resource('destinasi', DestinasiController::class);
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('kebudayaan', \App\Http\Controllers\Admin\KebudayaanController::class);
    Route::resource('galeri', AlbumController::class);
    Route::post('galeri/{id}/upload', [AlbumController::class, 'uploadFoto'])->name('galeri.upload');
    Route::delete('galeri/foto/{id}', [AlbumController::class, 'deleteFoto'])->name('galeri.foto.delete');
    
    // Route Kategori Berita
    Route::resource('kategori', \App\Http\Controllers\Admin\KategoriBeritaController::class);

    // Route Pengumuman
    Route::resource('pengumuman', \App\Http\Controllers\Admin\PengumumanController::class);

    // Route Event
    Route::resource('event', \App\Http\Controllers\Admin\EventController::class);


});
// ------------------------

Route::get('/wisata', [PublicWisataController::class, 'index'])->name('wisata.index');
Route::get('/wisata/{slug}', [PublicWisataController::class, 'show'])->name('wisata.show');
Route::get('/kebudayaan', [PublicKebudayaanController::class, 'index'])->name('kebudayaan.index');
Route::get('/galeri', [PublicGaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/{slug}', [PublicGaleriController::class, 'show'])->name('galeri.show');
Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('informasi.index');
Route::get('/informasi/berita/{slug}', [PublicInformasiController::class, 'showBerita'])->name('informasi.berita.show');
Route::get('/informasi/pengumuman/{slug}', [PublicInformasiController::class, 'showPengumuman'])->name('informasi.pengumuman.show');
Route::get('/informasi/event/{slug}', [PublicInformasiController::class, 'showEvent'])->name('informasi.event.show');

// Rute Profil Bawaan Breeze (Biarkan saja)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// --- INI BAGIAN PENTING UNTUK LOGIN ---
require __DIR__.'/auth.php';
// ------------------------------------