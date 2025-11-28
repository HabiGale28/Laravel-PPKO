<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Event;
use App\Models\KategoriBerita;

class PublicInformasiController extends Controller
{
    public function index(): View
    {
        // PENGUMUMAN (Gunakan try-catch agar aman jika tabel kosong/belum ada)
        try {
            $pengumuman = Pengumuman::where('status', 'publish')
                            ->latest('tanggal_publish')
                            ->take(3)
                            ->get();
        } catch (\Exception $e) {
            $pengumuman = collect([]);
        }

        // EVENT
        try {
            $event = Event::where('status', 'publish')
                        ->whereDate('tanggal_mulai', '>=', now())
                        ->orderBy('tanggal_mulai', 'asc')
                        ->take(4)
                        ->get();
        } catch (\Exception $e) {
            $event = collect([]);
        }

        // BERITA
        try {
            $berita = Berita::where('status', 'publish')
                        ->latest()
                        ->take(5)
                        ->get();
        } catch (\Exception $e) {
             $berita = collect([]);
        }

        return view('informasi.index', compact('pengumuman', 'event', 'berita'));
    }

    public function showBerita($slug): View
    {
        $berita = Berita::where('slug', $slug)->where('status', 'publish')->firstOrFail();
        
        // Sidebar data
        $kategori = KategoriBerita::all();
        $recent_posts = Berita::where('status', 'publish')
                            ->where('id', '!=', $berita->id)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('informasi.detail_berita', compact('berita', 'kategori', 'recent_posts'));
    }

    public function showPengumuman($slug): View
    {
        $pengumuman = Pengumuman::where('slug', $slug)->where('status', 'publish')->firstOrFail();
        return view('informasi.detail_pengumuman', compact('pengumuman'));
    }
}