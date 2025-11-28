<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DestinasiController extends Controller
{
    public function index()
    {
        $semuaDestinasi = Destinasi::latest()->get();
        return view('admin.destinasi.index', [
            'semuaDestinasi' => $semuaDestinasi
        ]);
    }

    public function create()
    {
        return view('admin.destinasi.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi input (Statistik DIHAPUS)
        $validatedData = $request->validate([
            'judul' => 'required|string|max:200|unique:destinasi', 
            'lokasi' => 'required|string|max:200',
            'provinsi' => 'required|string|max:100',
            'status' => 'required|in:publish,draft',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            
            'tipe_pariwisata' => 'nullable|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'konten' => 'nullable|string',
            'latitude' => 'nullable|string|max:100',
            'longitude' => 'nullable|string|max:100',
        ]);

        $namaGambar = null;
        if ($request->hasFile('gambar_utama')) {
            $file = $request->file('gambar_utama');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaGambar);
        }

        // 3. Simpan Data (Statistik DIHAPUS, default 0 di database)
        Destinasi::create([
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul']),
            'lokasi' => $validatedData['lokasi'],
            'provinsi' => $validatedData['provinsi'],
            'status' => $validatedData['status'],
            'gambar_utama' => $namaGambar,
            'user_id' => Auth::id(),

            'tipe_pariwisata' => $validatedData['tipe_pariwisata'],
            'deskripsi_singkat' => $validatedData['deskripsi_singkat'],
            'konten' => $validatedData['konten'],
            'latitude' => $validatedData['latitude'],
            'longitude' => $validatedData['longitude'],
        ]);

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi baru berhasil ditambahkan!');
    }

    public function show(Destinasi $destinasi)
    {
        //
    }

    public function edit(Destinasi $destinasi)
    {
        return view('admin.destinasi.edit', [
            'destinasi' => $destinasi
        ]);
    }

    public function update(Request $request, Destinasi $destinasi)
    {
        // 1. Validasi input (Statistik DIHAPUS)
        $validatedData = $request->validate([
            'judul' => 'required|string|max:200|unique:destinasi,judul,' . $destinasi->id,
            'lokasi' => 'required|string|max:200',
            'provinsi' => 'required|string|max:100',
            'status' => 'required|in:publish,draft',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',

            'tipe_pariwisata' => 'nullable|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'konten' => 'nullable|string',
            'latitude' => 'nullable|string|max:100',
            'longitude' => 'nullable|string|max:100',
        ]);

        $namaGambar = $destinasi->gambar_utama; 
        if ($request->hasFile('gambar_utama')) {
            if ($namaGambar && File::exists(public_path('uploads/' . $namaGambar))) {
                File::delete(public_path('uploads/' . $namaGambar));
            }
            
            $file = $request->file('gambar_utama');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaGambar);
        }

        // 3. Update Data (Statistik DIHAPUS)
        $destinasi->update([
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul']),
            'lokasi' => $validatedData['lokasi'],
            'provinsi' => $validatedData['provinsi'],
            'status' => $validatedData['status'],
            'gambar_utama' => $namaGambar,
            
            'tipe_pariwisata' => $validatedData['tipe_pariwisata'],
            'deskripsi_singkat' => $validatedData['deskripsi_singkat'],
            'konten' => $validatedData['konten'],
            'latitude' => $validatedData['latitude'],
            'longitude' => $validatedData['longitude'],
        ]);

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil diperbarui!');
    }

    public function destroy(Destinasi $destinasi)
    {
        if ($destinasi->gambar_utama && File::exists(public_path('uploads/' . $destinasi->gambar_utama))) {
            File::delete(public_path('uploads/' . $destinasi->gambar_utama));
        }

        $destinasi->delete();

        return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil dihapus.');
    }
}