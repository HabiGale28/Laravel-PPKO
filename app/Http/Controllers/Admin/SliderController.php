<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('urutan', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('uploads/sliders'), $imageName);

        Slider::create([
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'gambar' => $imageName,
            'urutan' => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.sliders.index')
                        ->with('success','Slider berhasil ditambahkan.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = [
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'urutan' => $request->urutan ?? 0,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if(File::exists(public_path('uploads/sliders/'.$slider->gambar))){
                File::delete(public_path('uploads/sliders/'.$slider->gambar));
            }
            
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('uploads/sliders'), $imageName);
            $data['gambar'] = $imageName;
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')
                        ->with('success','Slider berhasil diperbarui.');
    }

    public function destroy(Slider $slider)
    {
        if(File::exists(public_path('uploads/sliders/'.$slider->gambar))){
            File::delete(public_path('uploads/sliders/'.$slider->gambar));
        }
        
        $slider->delete();

        return redirect()->route('admin.sliders.index')
                        ->with('success','Slider berhasil dihapus.');
    }
}