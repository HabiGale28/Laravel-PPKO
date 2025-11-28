<x-app-layout>
    <h2>Buat Album Baru</h2>
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" style="background: white; padding: 20px; border-radius: 8px;">
        @csrf
        <div class="form-group">
            <label>Nama Album</label>
            <input type="text" name="nama_album" required>
        </div>
        <div class="form-group">
            <label>Cover Album</label>
            <input type="file" name="cover_album" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="3"></textarea>
        </div>
        <button class="btn btn-add">Simpan Album</button>
    </form>
</x-app-layout>