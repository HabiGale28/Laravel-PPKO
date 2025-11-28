<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    // Menampilkan Daftar Album
    public function index()
    {
        $albums = Album::withCount('fotos')->latest()->get();
        return view('admin.galeri.index', compact('albums'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan Album Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_album' => 'required',
            'cover_album' => 'required|image|max:5120',
        ]);

        $imageName = time().'.'.$request->cover_album->extension();  
        $request->cover_album->move(public_path('uploads/albums'), $imageName);

        Album::create([
            'nama_album' => $request->nama_album,
            'slug' => Str::slug($request->nama_album),
            'deskripsi' => $request->deskripsi,
            'cover_album' => $imageName,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Album berhasil dibuat');
    }

    // Halaman Detail Album (Untuk Upload Foto ke Album ini)
    public function show($id)
    {
        $album = Album::with('fotos')->findOrFail($id);
        return view('admin.galeri.show', compact('album'));
    }

    // Proses Upload Foto ke dalam Album
    public function uploadFoto(Request $request, $id)
    {
        $request->validate([
            'file_foto' => 'required|image|max:5120',
        ]);

        $imageName = time().rand(1,100).'.'.$request->file_foto->extension();  
        $request->file_foto->move(public_path('uploads/fotos'), $imageName);

        Foto::create([
            'album_id' => $id,
            'file_foto' => $imageName,
            'judul_foto' => $request->judul_foto
        ]);

        return back()->with('success', 'Foto berhasil ditambahkan ke album');
    }

    // Hapus Foto
    public function deleteFoto($id)
    {
        $foto = Foto::findOrFail($id);
        if(File::exists(public_path('uploads/fotos/'.$foto->file_foto))){
            File::delete(public_path('uploads/fotos/'.$foto->file_foto));
        }
        $foto->delete();
        return back()->with('success', 'Foto dihapus');
    }

    // Hapus Album (Beserta isinya)
    public function destroy($id)
    {
        $album = Album::with('fotos')->findOrFail($id);
        
        // Hapus cover
        if(File::exists(public_path('uploads/albums/'.$album->cover_album))){
            File::delete(public_path('uploads/albums/'.$album->cover_album));
        }

        // Hapus semua foto di dalamnya
        foreach($album->fotos as $foto){
            if(File::exists(public_path('uploads/fotos/'.$foto->file_foto))){
                File::delete(public_path('uploads/fotos/'.$foto->file_foto));
            }
        }
        
        $album->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Album dihapus');
    }
}