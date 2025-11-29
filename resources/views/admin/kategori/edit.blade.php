<x-app-layout>
        <h2>Edit Kategori</h2>
        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" style="background:white; padding:20px; border-radius:8px; max-width:500px;">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama" value="{{ $kategori->nama }}" required>
            </div>
            <button class="btn btn-add">Update</button>
        </form>
    </x-app-layout>