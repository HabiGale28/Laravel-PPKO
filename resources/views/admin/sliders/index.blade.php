<x-app-layout>
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2>Konfigurasi Beranda (Slider)</h2>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-add">+ Tambah Slider</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul & Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('uploads/sliders/'.$slider->gambar) }}" width="100" style="border-radius:5px;">
                </td>
                <td>
                    <strong>{{ $slider->judul }}</strong><br>
                    <small>{{ $slider->lokasi }}</small>
                </td>
                <td>
                    <a href="{{ route('admin.sliders.edit',$slider->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('admin.sliders.destroy',$slider->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Hapus slider ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>