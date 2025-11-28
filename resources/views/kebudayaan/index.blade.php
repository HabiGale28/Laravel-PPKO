<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seni dan Kebudayaan - Wonderful Indonesia</title>
    <style>
        /* === 1. COPY STYLE DARI WELCOME.BLADE.PHP (TEMA TERANG) === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff; /* Latar Putih */
            color: #333;      /* Teks Gelap */
            overflow-x: hidden;
        }

        /* Header Styling */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7); 
            backdrop-filter: blur(10px);
            padding: 20px 40px;
            z-index: 1000;
            transition: all 0.3s;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo h1 {
            font-size: 24px;
            font-weight: 300;
            color: white;
        }

        .logo .wonderful {
            color: #00bcd4;
            font-weight: 700;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
            align-items: center;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
            font-size: 14px;
        }

        .nav-menu a:hover {
            color: #00bcd4;
        }

        /* === 2. STYLE KHUSUS HALAMAN KEBUDAYAAN === */

        /* Banner */
        .page-banner {
            height: 50vh;
            /* Ganti gambar background banner di sini */
            background-image: url('https://images.unsplash.com/photo-1533900298318-6b8da08a523e?w=1920');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            margin-bottom: 50px;
        }
        .page-banner::before { 
            content:''; 
            position:absolute; 
            inset:0; 
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
        }
        .banner-content { position: relative; z-index: 2; color: white; }
        .banner-content h1 { font-size: 48px; font-family: serif; margin-bottom: 5px; }
        .banner-content p { font-size: 18px; letter-spacing: 1px; opacity: 0.9; }

        /* Container & Grid */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px 80px; }
        
        .culture-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 30px;
        }

        /* Card Style (Overlay Text) */
        .culture-card {
            position: relative;
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .culture-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.2); }
        .culture-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .culture-card:hover img {
            transform: scale(1.05);
        }
        
        /* Overlay Text di dalam Card */
        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 30px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            color: white;
        }
        .card-category {
            font-size: 12px;
            display: inline-block;
            background: #ffc107;
            color: #333;
            padding: 4px 10px;
            border-radius: 4px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .card-title {
            font-size: 22px;
            font-weight: bold;
            font-family: serif;
            line-height: 1.3;
        }
        .card-desc {
            font-size: 14px;
            opacity: 0.8;
            margin-top: 5px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 992px) { .culture-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 768px) { 
            .culture-grid { grid-template-columns: 1fr; } 
            .banner-content h1 { font-size: 36px; }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="nav-container">
            <div class="logo">
                <h1><span class="wonderful">wonderful</span> indonesia</h1>
            </div>
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ route('home') }}">🏠 Beranda</a></li>
                    <li><a href="{{ route('profil.desa') }}">👤 Profil</a></li>
                    <li><a href="{{ route('wisata.index') }}">🏝️ Wisata</a></li>
                    <li><a href="{{ route('kebudayaan.index') }}" style="color: #00bcd4;">🎭 Kebudayaan</a></li>
                    <li><a href="#">📰 Berita</a></li> 
                    <li><a href="#informasi">ℹ️ Informasi</a></li>
                    <li><a href="#galeri">📸 Galeri</a></li>
                    <li><a href="#kontak">📞 Kontak</a></li>
                    
                    </ul>
            </nav>
        </div>
    </header>

    <div class="page-banner">
        <div class="banner-content">
            <h1>Seni dan Kebudayaan</h1>
            <p>Kekayaan warisan budaya nusantara</p>
        </div>
    </div>

    <div class="container">
        
        @if($kebudayaan->count() > 0)
            <div class="culture-grid">
                @foreach($kebudayaan as $item)
                <div class="culture-card">
                    <img src="{{ asset('uploads/kebudayaan/'.$item->gambar) }}" alt="{{ $item->judul }}">
                    <div class="card-overlay">
                        <div class="card-category">{{ $item->kategori }}</div>
                        <div class="card-title">{{ $item->judul }}</div>
                        <div class="card-desc">{{ Str::limit($item->deskripsi, 80) }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 50px; color: #666;">
                <h3 style="margin-bottom: 10px; font-size: 24px;">Belum ada data kebudayaan.</h3>
                <p>Silakan tambahkan data melalui panel admin.</p>
            </div>
        @endif

    </div>

</body>
</html>