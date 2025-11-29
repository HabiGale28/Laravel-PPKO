<x-app-layout>
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2 style="font-size: 24px; font-weight: bold; color: #333;">Kelola Event</h2>
        <a href="{{ route('admin.event.create') }}" class="btn btn-add">+ Buat Event Baru</a>
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
                <th>Poster</th>
                <th>Nama Event</th>
                <th>Jadwal</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($item->gambar)
                        <img src="{{ asset('uploads/event/'.$item->gambar) }}" width="80" style="border-radius:5px; object-fit:cover;">
                    @else
                        <span style="color:#999; font-size:12px;">No Image</span>
                    @endif
                </td>
                <td>
                    <strong>{{ $item->judul }}</strong>
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                    @if($item->tanggal_selesai)
                        <br><small>s/d {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</small>
                    @endif
                </td>
                <td>{{ $item->lokasi }}</td>
                <td>
                    @if($item->status == 'publish')
                        <span style="background: #d1e7dd; color: #0f5132; padding: 3px 8px; border-radius: 5px; font-size: 12px;">Published</span>
                    @else
                        <span style="background: #fff3cd; color: #664d03; padding: 3px 8px; border-radius: 5px; font-size: 12px;">Draft</span>
                    @endif
                </td>
                <td>
                    <div style="display:flex; gap:5px;">
                        <a href="{{ route('admin.event.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.event.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-delete">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align:center; padding:20px;">Belum ada event.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>