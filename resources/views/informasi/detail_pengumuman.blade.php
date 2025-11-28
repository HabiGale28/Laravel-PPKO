<!DOCTYPE html>
<html lang="id">
<head>
    <title>{{ $pengumuman->judul }}</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #f4f7f6; color: #333; }
        .header-simple { background: #004d40; color: white; padding: 20px 40px; }
        .container { max-width: 800px; margin: 50px auto; background: white; padding: 50px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        .p-title { font-size: 36px; margin-bottom: 10px; color: #2c3e50; font-family: serif; }
        .p-date { background: #e0f2f1; color: #00695c; padding: 6px 15px; border-radius: 20px; display: inline-block; font-size: 14px; margin-bottom: 30px; font-weight: bold; }
        .p-content { font-size: 18px; line-height: 1.8; color: #444; }
        .p-img { width: 100%; border-radius: 8px; margin-bottom: 30px; }
    </style>
</head>
<body>
    <div class="header-simple">
        <a href="{{ route('informasi.index') }}" style="color: white; text-decoration: none; font-weight: bold;">&larr; Kembali ke Informasi</a>
    </div>

    <div class="container">
        <h1 class="p-title">{{ $pengumuman->judul }}</h1>
        <div class="p-date">📅 {{ \Carbon\Carbon::parse($pengumuman->tanggal_publish)->format('d F Y') }}</div>
        
        @if($pengumuman->gambar)
            <img src="{{ asset('uploads/pengumuman/'.$pengumuman->gambar) }}" class="p-img">
        @endif

        <div class="p-content">
            {!! nl2br(e($pengumuman->konten)) !!}
        </div>
    </div>
</body>
</html>