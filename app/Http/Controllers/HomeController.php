<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

// --- IMPORT MODEL DI SINI (JANGAN DIHAPUS) ---
use App\Models\Destinasi;
use App\Models\Slider;
use App\Models\Berita; // <-- INI YANG TADI HILANG DAN BIKIN ERROR
// ---------------------------------------------

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (homepage).
     */
    public function index(): View
    {
        $js_destinations = [];
        $latest_destinations = [];
        $latest_berita = [];
        $sliders = [];

        try {
            // 1. Ambil Slider
            $sliders = Slider::orderBy('urutan', 'asc')->get();

            // 2. Ambil data untuk Hero Slider (Destinasi)
            $destinationsData = Destinasi::where('status', 'publish')
                                    ->orderBy('id', 'asc')
                                    ->limit(5)
                                    ->get();

            // 3. Ambil 3 data destinasi terbaru untuk card
            $latest_destinations = Destinasi::where('status', 'publish')
                                    ->latest()
                                    ->limit(3)
                                    ->get();

            // 4. Ambil 4 data berita terbaru untuk card
            // (Pungut data hanya jika tabel berita sudah ada)
            try {
                $latest_berita = Berita::where('status', 'publish')
                                    ->latest()
                                    ->limit(4)
                                    ->get();
            } catch (\Exception $e) {
                $latest_berita = collect([]); // Kosongkan jika error
            }

            // 5. Format data untuk JavaScript Hero Slider
            $js_destinations = $destinationsData->map(function($d) {
                $imageUrl = $d->gambar_utama 
                    ? asset('uploads/' . $d->gambar_utama)
                    : 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920';

                return [
                    'title' => $d->judul,
                    'location' => $d->lokasi . ', ' . $d->provinsi,
                    'wisata' => (int)$d->wisata,
                    'kebudayaan' => (int)$d->kebudayaan,
                    'event' => (int)$d->event,
                    'image_url' => $imageUrl 
                ];
            });

        } catch (\Exception $e) {
            Log::error('Error di HomeController: ' . $e->getMessage());
        }

        return view('welcome', [
            'destinations' => $js_destinations,
            'latest_destinations' => $latest_destinations,
            'latest_berita' => $latest_berita,
            'sliders' => $sliders
        ]);
    }
}