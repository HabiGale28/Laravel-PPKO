<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicGaleriController extends Controller
{
    // Halaman Utama Galeri (List Album)
    public function index(): View
    {
        // Tampilkan 3 Album per halaman (sesuai request)
        $albums = Album::withCount('fotos')->latest()->paginate(3); 
        return view('galeri.index', compact('albums'));
    }

    // Halaman Detail Album (Isi Foto)
    public function show($slug): View
    {
        $album = Album::where('slug', $slug)->firstOrFail();
        // Tampilkan 9 Foto per halaman (sesuai request)
        $fotos = $album->fotos()->latest()->paginate(9);
        
        return view('galeri.show', compact('album', 'fotos'));
    }
}