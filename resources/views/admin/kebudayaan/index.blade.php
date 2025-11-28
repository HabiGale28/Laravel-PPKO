<x-app-layout>
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2>Kelola Seni & Kebudayaan</h2>
        <a href="{{ route('admin.kebudayaan.create') }}" class="btn btn-add">+ Tambah Data</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul & Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kebudayaan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('uploads/kebudayaan/'.$item->gambar) }}" width="80" style="border-radius:5px;"></td>
                <td>
                    <strong>{{ $item->judul }}</strong><br>
                    <span style="font-size:12px; background:#eee; padding:2px 5px; border-radius:3px;">{{ $item->kategori }}</span>
                </td>
                <td>
                    <a href="{{ route('admin.kebudayaan.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('admin.kebudayaan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-delete" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>