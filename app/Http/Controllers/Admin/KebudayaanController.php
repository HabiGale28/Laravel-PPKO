<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kebudayaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class KebudayaanController extends Controller
{
    public function index()
    {
        $kebudayaan = Kebudayaan::latest()->get();
        return view('admin.kebudayaan.index', compact('kebudayaan'));
    }

    public function create()
    {
        return view('admin.kebudayaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('uploads/kebudayaan'), $imageName);

        Kebudayaan::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.kebudayaan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Kebudayaan $kebudayaan)
    {
        return view('admin.kebudayaan.edit', compact('kebudayaan'));
    }

    public function update(Request $request, Kebudayaan $kebudayaan)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if (File::exists(public_path('uploads/kebudayaan/' . $kebudayaan->gambar))) {
                File::delete(public_path('uploads/kebudayaan/' . $kebudayaan->gambar));
            }

            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('uploads/kebudayaan'), $imageName);
            $data['gambar'] = $imageName;
        }

        $kebudayaan->update($data);

        return redirect()->route('admin.kebudayaan.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Kebudayaan $kebudayaan)
    {
        if (File::exists(public_path('uploads/kebudayaan/' . $kebudayaan->gambar))) {
            File::delete(public_path('uploads/kebudayaan/' . $kebudayaan->gambar));
        }
        $kebudayaan->delete();
        return redirect()->route('admin.kebudayaan.index')->with('success', 'Data berhasil dihapus');
    }
}