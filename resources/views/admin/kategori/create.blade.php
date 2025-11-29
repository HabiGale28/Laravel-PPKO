<x-app-layout>
        <h2>Tambah Kategori</h2>
        <form action="{{ route('admin.kategori.store') }}" method="POST" style="background:white; padding:20px; border-radius:8px; max-width:500px;">
            @csrf
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama" required placeholder="Contoh: Pendidikan, Ekonomi...">
            </div>
            <button class="btn btn-add">Simpan</button>
        </form>
    </x-app-layout>