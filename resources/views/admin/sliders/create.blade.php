<x-app-layout>
    <h2>Tambah Slider Baru</h2>
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul Utama (Besar)</label>
            <input type="text" name="judul" required placeholder="Contoh: Kampung Tihi-Tihi">
        </div>
        <div class="form-group">
            <label>Teks Lokasi (Kecil di atas judul)</label>
            <input type="text" name="lokasi" placeholder="Contoh: Bontang, Kalimantan Timur">
        </div>
        <div class="form-group">
            <label>Gambar Background</label>
            <input type="file" name="gambar" accept="image/*" required>
        </div>
        <div class="form-group">
            <label>Urutan Tampil (Opsional)</label>
            <input type="number" name="urutan" value="0">
        </div>
        <button type="submit" class="btn btn-add">Simpan Slider</button>
    </form>
</x-app-layout>