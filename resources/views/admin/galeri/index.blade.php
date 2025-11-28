<x-app-layout>
    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
        <h2>Kelola Album Galeri</h2>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-add">+ Buat Album Baru</a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
        @foreach($albums as $album)
        <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <img src="{{ asset('uploads/albums/'.$album->cover_album) }}" style="width: 100%; height: 150px; object-fit: cover;">
            <div style="padding: 15px;">
                <h3 style="margin: 0; font-size: 18px;">{{ $album->nama_album }}</h3>
                <p style="color: #777; font-size: 12px;">{{ $album->fotos_count }} Foto</p>
                <div style="margin-top: 10px; display: flex; gap: 10px;">
                    <a href="{{ route('admin.galeri.show', $album->id) }}" class="btn btn-edit" style="flex: 1; text-align: center;">Kelola Foto</a>
                    <form action="{{ route('admin.galeri.destroy', $album->id) }}" method="POST" onsubmit="return confirm('Hapus album ini?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-delete">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>