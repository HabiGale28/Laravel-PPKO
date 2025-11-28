<x-app-layout>
    <div style="margin-bottom: 20px;">
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Edit Berita</h2>
        <a href="{{ route('admin.berita.index') }}" class="btn" style="background: #6c757d; color: white;">&larr; Kembali</a>
    </div>

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            
            <!-- KOLOM KIRI -->
            <div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;">Isi Berita</label>
                    <textarea name="konten" rows="15" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ old('konten', $berita->konten) }}</textarea>
                </div>
            </div>

            <!-- KOLOM KANAN -->
            <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: fit-content;">
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Gambar Utama</label>
                    
                    @if($berita->gambar)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('uploads/berita/'.$berita->gambar) }}" style="width: 100%; border-radius: 5px;">
                        </div>
                    @endif

                    <input type="file" name="gambar" style="font-size: 12px;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Status</label>
                    <select name="status" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="publish" @selected($berita->status == 'publish')>Terbitkan</option>
                        <option value="draft" @selected($berita->status == 'draft')>Simpan Draft</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-add" style="width: 100%; padding: 12px;">Update Berita</button>
            </div>
        </div>
    </form>
</x-app-layout>