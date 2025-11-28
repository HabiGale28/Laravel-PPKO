<x-app-layout>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Edit Destinasi Wisata</h2>
        <a href="{{ route('admin.destinasi.index') }}" class="btn" style="background: #6c757d; color: white;">&larr; Kembali</a>
    </div>

    <form action="{{ route('admin.destinasi.update', $destinasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px;">
            
            <!-- KOLOM KIRI -->
            <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: fit-content;">
                <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: #555;">Gambar Utama</h3>
                
                @if($destinasi->gambar_utama)
                    <div style="margin-bottom: 15px; text-align: center;">
                        <img src="{{ asset('uploads/' . $destinasi->gambar_utama) }}" alt="Gambar Saat Ini" style="width: 100%; border-radius: 5px; border: 1px solid #ddd;">
                        <p style="font-size: 12px; color: #888; margin-top: 5px;">Gambar saat ini</p>
                    </div>
                @endif

                <div style="border: 2px dashed #ddd; padding: 20px; text-align: center; border-radius: 5px; margin-bottom: 15px;">
                    <span style="font-size: 40px; color: #ccc;">📷</span>
                    <p style="font-size: 12px; color: #999; margin-top: 10px;">Ganti Gambar (Opsional)</p>
                    <input type="file" name="gambar_utama" style="margin-top: 10px; font-size: 12px; width: 100%;">
                </div>
                
                <div class="form-group">
                    <label style="font-size: 14px;">Status</label>
                    <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="publish" @selected(old('status', $destinasi->status) == 'publish')>Publikasikan</option>
                        <option value="draft" @selected(old('status', $destinasi->status) == 'draft')>Sembunyikan</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-add" style="width: 100%; margin-top: 10px; padding: 12px;">Update Data</button>
            </div>

            <!-- KOLOM KANAN -->
            <div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Judul / Nama Tempat Wisata <span style="color:red">*</span></label>
                    <input type="text" name="judul" value="{{ old('judul', $destinasi->judul) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label style="font-weight: 600;">Tipe Pariwisata</label>
                        <select name="tipe_pariwisata" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <option value="">Pilih Tipe</option>
                            <option value="Pantai" @selected(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Pantai')>Pantai</option>
                            <option value="Gunung" @selected(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Gunung')>Gunung</option>
                            <option value="Budaya" @selected(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Budaya')>Budaya</option>
                            <option value="Religi" @selected(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Religi')>Religi</option>
                            <option value="Kuliner" @selected(old('tipe_pariwisata', $destinasi->tipe_pariwisata) == 'Kuliner')>Kuliner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: 600;">Lokasi (Kecamatan/Desa)</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi', $destinasi->lokasi) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Provinsi</label>
                    <input type="text" name="provinsi" value="{{ old('provinsi', $destinasi->provinsi) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Deskripsi Singkat (Tampil di Card)</label>
                    <textarea name="deskripsi_singkat" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ old('deskripsi_singkat', $destinasi->deskripsi_singkat) }}</textarea>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Konten Lengkap (Artikel)</label>
                    <textarea name="konten" rows="10" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ old('konten', $destinasi->konten) }}</textarea>
                </div>

            </div>
        </div>
    </form>
</x-app-layout>