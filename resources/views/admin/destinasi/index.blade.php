<x-app-layout>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Kelola Destinasi</h2>
        <a href="{{ route('admin.destinasi.create') }}" class="btn btn-add">+ Tambah Destinasi</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($semuaDestinasi ?? [] as $destinasi)
                <tr>
                    <td>{{ $destinasi->judul }}</td>
                    <td>{{ $destinasi->lokasi }}, {{ $destinasi->provinsi }}</td>
                    <td>{{ $destinasi->status }}</td>
                    <td>
                        <a href="{{ route('admin.destinasi.edit', $destinasi->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.destinasi.destroy', $destinasi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada data destinasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>