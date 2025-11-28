<x-app-layout>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Edit Seni & Kebudayaan</h2>
        <a href="{{ route('admin.kebudayaan.index') }}" class="btn" style="background: #6c757d; color: white;">&larr; Kembali</a>
    </div>

    @if ($errors->any())
        <div style="background: #ffebee; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
            <strong style="color: #d32f2f;">Whoops! Ada kesalahan:</strong>
            <ul style="color: #d32f2f; margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kebudayaan.update', $kebudayaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px;">
            
            <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); height: fit-content;">
                <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: #555;">Gambar Sampul</h3>
                
                @if($kebudayaan->gambar)
                    <div style="margin-bottom: 15px; text-align: center;">
                        <img src="{{ asset('uploads/kebudayaan/' . $kebudayaan->gambar) }}" alt="Gambar Saat Ini" style="width: 100%; border-radius: 5px; border: 1px solid #ddd;">
                        <p style="font-size: 12px; color: #888; margin-top: 5px;">Gambar saat ini</p>
                    </div>
                @endif

                <div style="border: 2px dashed #ddd; padding: 20px; text-align: center; border-radius: 5px; margin-bottom: 15px;">
                    <span style="font-size: 40px; color: #ccc;">🖼️</span>
                    <p style="font-size: 12px; color: #999; margin-top: 10px;">Ganti Gambar (Opsional)</p>
                    <input type="file" name="gambar" style="margin-top: 10px; font-size: 12px; width: 100%;">
                    <small style="display:block; margin-top:5px; color:#aaa;">Max: 2MB (jpg, png, jpeg)</small>
                </div>

                <button type="submit" class="btn btn-add" style="width: 100%; margin-top: 10px; padding: 12px;">Update Data</button>
            </div>

            <div style="background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $kebudayaan->judul) }}" placeholder="Contoh: Tari Cakalele" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Kategori</label>
                    <select name="kategori" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="">Pilih Kategori</option>
                        <option value="Kesenian" @selected(old('kategori', $kebudayaan->kategori) == 'Kesenian')>Kesenian</option>
                        <option value="Kebudayaan" @selected(old('kategori', $kebudayaan->kategori) == 'Kebudayaan')>Kebudayaan</option>
                        <option value="Kuliner" @selected(old('kategori', $kebudayaan->kategori) == 'Kuliner')>Kuliner</option>
                        <option value="Tradisi" @selected(old('kategori', $kebudayaan->kategori) == 'Tradisi')>Tradisi</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600;">Deskripsi</label>
                    <textarea name="deskripsi" rows="10" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" placeholder="Jelaskan detail kebudayaan ini...">{{ old('deskripsi', $kebudayaan->deskripsi) }}</textarea>
                </div>

            </div>
        </div>
    </form>
</x-app-layout>