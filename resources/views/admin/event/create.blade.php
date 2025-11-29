<x-app-layout>
    <h2>Buat Event Baru</h2>
    <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data" style="background:white; padding:20px; border-radius:8px;">
        @csrf
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label>Nama Event</label>
                <input type="text" name="judul" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" required>
            </div>
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" required>
            </div>
            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai">
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi Singkat (Card)</label>
            <textarea name="deskripsi_singkat" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Detail Lengkap</label>
            <textarea name="konten" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label>Gambar Poster</label>
            <input type="file" name="gambar">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="publish">Publikasikan</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        <button class="btn btn-add">Simpan Event</button>
    </form>
</x-app-layout>