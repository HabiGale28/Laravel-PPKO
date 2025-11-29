<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategori = KategoriBerita::latest()->get();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|unique:kategori_berita']);

        KategoriBerita::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama)
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama' => 'required|unique:kategori_berita,nama,'.$id]);
        
        $kategori = KategoriBerita::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama)
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        KategoriBerita::findOrFail($id)->delete();
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori dihapus');
    }
}