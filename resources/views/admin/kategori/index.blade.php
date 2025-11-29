<x-app-layout>
        <div style="display:flex; justify-content:space-between; margin-bottom:20px;">
            <h2>Kelola Kategori Berita</h2>
            <a href="{{ route('admin.kategori.create') }}" class="btn btn-add">+ Tambah Kategori</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-delete" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-app-layout>