<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'deskripsi_singkat' => 'required',
            'konten' => 'nullable',
            'status' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $data['slug'] = Str::slug($request->judul);
        // $data['user_id'] = Auth::id(); // Aktifkan jika tabel event punya kolom user_id

        if ($request->hasFile('gambar')) {
            $name = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/event'), $name);
            $data['gambar'] = $name;
        }

        Event::create($data);
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil dibuat');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $data = $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'deskripsi_singkat' => 'required',
            'konten' => 'nullable',
            'status' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            if ($event->gambar && File::exists(public_path('uploads/event/'.$event->gambar))) {
                File::delete(public_path('uploads/event/'.$event->gambar));
            }
            $name = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/event'), $name);
            $data['gambar'] = $name;
        }

        $event->update($data);
        return redirect()->route('admin.event.index')->with('success', 'Event diperbarui');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->gambar && File::exists(public_path('uploads/event/'.$event->gambar))) {
            File::delete(public_path('uploads/event/'.$event->gambar));
        }
        $event->delete();
        return redirect()->route('admin.event.index')->with('success', 'Event dihapus');
    }
}