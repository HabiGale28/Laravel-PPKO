<x-app-layout>
    <h2>Tambah Seni & Kebudayaan</h2>
    <form action="{{ route('admin.kebudayaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" required placeholder="Contoh: Tari Adat">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori">
                <option value="Kesenian">Kesenian</option>
                <option value="Kebudayaan">Kebudayaan</option>
                <option value="Kuliner">Kuliner</option>
                <option value="Tradisi">Tradisi</option>
            </select>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="5"></textarea>
        </div>
        <button class="btn btn-add">Simpan</button>
    </form>
</x-app-layout>