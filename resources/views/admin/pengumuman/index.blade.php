<x-app-layout>
        <div style="display:flex; justify-content:space-between; margin-bottom:20px;">
            <h2>Kelola Pengumuman</h2>
            <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-add">+ Buat Pengumuman</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengumuman as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_publish)->format('d M Y') }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-delete" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-app-layout>