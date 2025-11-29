<x-app-layout>
        <h2>Buat Pengumuman</h2>
        <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data" style="background:white; padding:20px; border-radius:8px;">
            @csrf
            <div class="form-group">
                <label>Judul Pengumuman</label>
                <input type="text" name="judul" required>
            </div>
            <div class="form-group">
                <label>Isi Pengumuman</label>
                <textarea name="konten" rows="10" style="width:100%; border:1px solid #ddd; padding:10px;"></textarea>
            </div>
            <div class="form-group">
                <label>Gambar Lampiran (Opsional)</label>
                <input type="file" name="gambar">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="publish">Publikasikan</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <button class="btn btn-add">Simpan</button>
        </form>
    </x-app-layout>