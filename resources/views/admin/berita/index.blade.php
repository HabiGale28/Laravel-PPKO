<x-app-layout>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Kelola Berita & Informasi</h2>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-add">+ Tulis Berita Baru</a>
    </div>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Variabel $daftar_berita sekarang sudah dikirim dari Controller -->
            @forelse($daftar_berita as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('uploads/berita/' . $item->gambar) }}" width="60" style="border-radius: 5px;">
                        @else
                            <span style="color: #999;">No Image</span>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $item->judul }}</strong><br>
                        <small style="color: #777;">{{ $item->created_at->format('d M Y') }}</small>
                    </td>
                    <td>
                        @if($item->status == 'publish')
                            <span style="background: #d1e7dd; color: #0f5132; padding: 3px 8px; border-radius: 5px; font-size: 12px;">Published</span>
                        @else
                            <span style="background: #fff3cd; color: #664d03; padding: 3px 8px; border-radius: 5px; font-size: 12px;">Draft</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">Belum ada berita/informasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>