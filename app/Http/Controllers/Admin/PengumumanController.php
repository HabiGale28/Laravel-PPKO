<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'status' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['tanggal_publish'] = now();

        if ($request->hasFile('gambar')) {
            $name = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/pengumuman'), $name);
            $data['gambar'] = $name;
        }

        Pengumuman::create($data);
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman dibuat');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        
        $data = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'status' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            if ($pengumuman->gambar && File::exists(public_path('uploads/pengumuman/'.$pengumuman->gambar))) {
                File::delete(public_path('uploads/pengumuman/'.$pengumuman->gambar));
            }
            $name = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/pengumuman'), $name);
            $data['gambar'] = $name;
        }

        $pengumuman->update($data);
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman diupdate');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        if ($pengumuman->gambar && File::exists(public_path('uploads/pengumuman/'.$pengumuman->gambar))) {
            File::delete(public_path('uploads/pengumuman/'.$pengumuman->gambar));
        }
        $pengumuman->delete();
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman dihapus');
    }
}