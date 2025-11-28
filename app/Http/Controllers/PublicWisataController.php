<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicWisataController extends Controller
{
    // Halaman Daftar Wisata
    public function index(): View
    {
        $destinations = Destinasi::where('status', 'publish')->latest()->get();
        return view('wisata.index', compact('destinations'));
    }

    // Halaman Detail Wisata
    public function show($slug): View
    {
        $destinasi = Destinasi::where('slug', $slug)->where('status', 'publish')->firstOrFail();
        return view('wisata.show', compact('destinasi'));
    }
}