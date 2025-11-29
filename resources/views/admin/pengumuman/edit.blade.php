<x-app-layout>
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Edit Pengumuman</h2>
        <a href="{{ route('admin.pengumuman.index') }}" class="btn" style="background:#6c757d; color:white;">&larr; Kembali</a>
    </div>

    <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            
            <!-- KIRI: KONTEN UTAMA -->
            <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.05);">
                <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" name="judul" value="{{ old('judul', $pengumuman->judul) }}" required>
                </div>
                <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <textarea name="konten" rows="15" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">{{ old('konten', $pengumuman->konten) }}</textarea>
                </div>
            </div>

            <!-- KANAN: OPSI TAMBAHAN -->
            <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.05); height:fit-content;">
                <div class="form-group">
                    <label>Gambar Lampiran</label>
                    @if($pengumuman->gambar)
                        <div style="margin-bottom:10px; border:1px solid #eee; padding:5px; border-radius:5px;">
                            <img src="{{ asset('uploads/pengumuman/'.$pengumuman->gambar) }}" style="width:100%; border-radius:5px;">
                            <p style="font-size:12px; color:#888; text-align:center; margin-top:5px;">Gambar saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="gambar" style="font-size:12px;">
                    <small style="color:#999;">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                        <option value="publish" @selected($pengumuman->status == 'publish')>Publikasikan</option>
                        <option value="draft" @selected($pengumuman->status == 'draft')>Draft (Sembunyikan)</option>
                    </select>
                </div>

                <button class="btn btn-add" style="width:100%; margin-top:10px;">Update Pengumuman</button>
            </div>

        </div>
    </form>
</x-app-layout>