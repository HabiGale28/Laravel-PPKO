<x-app-layout>
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.galeri.index') }}" class="btn" style="background: #777; color: white;">&larr; Kembali ke Album</a>
        <h2>Album: {{ $album->nama_album }}</h2>
    </div>

    <!-- Form Upload Foto -->
    <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
        <h4>Upload Foto ke Album Ini</h4>
        <form action="{{ route('admin.galeri.upload', $album->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 10px; align-items: flex-end;">
            @csrf
            <div style="flex: 1;">
                <label>Pilih Foto</label>
                <input type="file" name="file_foto" required style="width: 100%;">
            </div>
            <div style="flex: 1;">
                <label>Judul Foto (Opsional)</label>
                <input type="text" name="judul_foto" style="width: 100%;">
            </div>
            <button class="btn btn-add">Upload</button>
        </form>
    </div>

    <!-- List Foto -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 15px;">
        @foreach($album->fotos as $foto)
        <div style="position: relative; group;">
            <img src="{{ asset('uploads/fotos/'.$foto->file_foto) }}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 5px;">
            <form action="{{ route('admin.galeri.foto.delete', $foto->id) }}" method="POST" style="position: absolute; top: 5px; right: 5px;">
                @csrf @method('DELETE')
                <button onclick="return confirm('Hapus foto?')" style="background: red; color: white; border: none; padding: 5px; border-radius: 3px; cursor: pointer;">X</button>
            </form>
        </div>
        @endforeach
    </div>
</x-app-layout>