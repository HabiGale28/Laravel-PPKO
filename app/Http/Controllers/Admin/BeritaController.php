<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    public function index()
    {
        // PERBAIKAN: Ubah nama variabel jadi $daftar_berita agar sesuai dengan View
        $daftar_berita = Berita::latest()->get();
        
        return view('admin.berita.index', [
            'daftar_berita' => $daftar_berita
        ]);
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Pastikan validasi sesuai nama tabel (berita/beritas)
            // Jika migrasi Anda pakai 'berita', gunakan 'unique:berita'
            'judul' => 'required|string|max:200|unique:berita', 
            'konten' => 'required|string',
            'status' => 'required|in:publish,draft',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $namaGambar = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $namaGambar);
        }

        Berita::create([
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul']),
            'konten' => $validatedData['konten'],
            'status' => $validatedData['status'],
            'gambar' => $namaGambar,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:200|unique:berita,judul,' . $berita->id,
            'konten' => 'required|string',
            'status' => 'required|in:publish,draft',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $namaGambar = $berita->gambar;
        if ($request->hasFile('gambar')) {
            if ($namaGambar && File::exists(public_path('uploads/berita/' . $namaGambar))) {
                File::delete(public_path('uploads/berita/' . $namaGambar));
            }
            
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $namaGambar);
        }

        $berita->update([
            'judul' => $validatedData['judul'],
            'slug' => Str::slug($validatedData['judul']),
            'konten' => $validatedData['konten'],
            'status' => $validatedData['status'],
            'gambar' => $namaGambar,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && File::exists(public_path('uploads/berita/' . $berita->gambar))) {
            File::delete(public_path('uploads/berita/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil dihapus.');
    }
}