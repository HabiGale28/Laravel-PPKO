<x-app-layout>
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2>Edit Slider</h2>
        <a href="{{ route('admin.sliders.index') }}" class="btn" style="background:#6c757d; color:white;">&larr; Kembali</a>
    </div>

    @if ($errors->any())
        <div class="flash-message error">
            <strong>Whoops!</strong> Ada kesalahan pada input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="admin-content-box">
        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="form-group">
                <label>Judul Utama (Besar)</label>
                <input type="text" name="judul" value="{{ old('judul', $slider->judul) }}" required placeholder="Contoh: Kampung Tihi-Tihi">
            </div>
    
            <div class="form-group">
                <label>Teks Lokasi (Kecil di atas judul)</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $slider->lokasi) }}" placeholder="Contoh: Bontang, Kalimantan Timur">
            </div>
    
            <div class="form-group">
                <label>Gambar Background (Kosongkan jika tidak ingin mengubah gambar)</label>
                <input type="file" name="gambar">
                
                @if($slider->gambar)
                    <div style="margin-top: 10px;">
                        <p style="font-size:12px; color:#666;">Gambar Saat Ini:</p>
                        <img src="{{ asset('uploads/sliders/' . $slider->gambar) }}" alt="Slider Image" width="200" style="border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label>Urutan Tampil (Semakin kecil angka, semakin awal muncul)</label>
                <input type="number" name="urutan" value="{{ old('urutan', $slider->urutan) }}">
            </div>
    
            <div style="margin-top: 30px;">
                <button type="submit" class="btn btn-add">Update Slider</button>