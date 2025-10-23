<x-app-layout>
    <x-slot name="title">
        Kelola Berita
    </x-slot>

    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Kelola Berita</h2>
        </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Author</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($daftar_berita as $berita)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $berita->judul }}</td>
                    <td>{{ $berita->author->name }}</td> 
                    <td>{{ $berita->status }}</td>
                    <td>{{ $berita->created_at->format('d M Y') }}</td>
                    <td>
                        </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data berita.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-app-layout>