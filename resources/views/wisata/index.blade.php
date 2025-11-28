<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata - Wonderful Indonesia</title>
    <style>
        /* === 1. COPY STYLE DARI WELCOME.BLADE.PHP === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff;
            color: #333;
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

        /* === 2. STYLE KHUSUS HALAMAN WISATA === */

        /* Banner Halaman Wisata */
        .page-banner {
            height: 50vh; /* Setengah layar */
            background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-bottom: 50px;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
        }

        .banner-content {
            position: relative;
            z-index: 2;
        }
        .banner-content h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .banner-content p {
            font-size: 18px;
            opacity: 0.9;
        }

        /* Container Utama */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 80px;
        }

        /* Grid Destinasi */
        .destinasi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        /* Card Styling */
        .destinasi-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #eee;
        }

        .destinasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .destinasi-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .card-content {
            padding: 25px;
            text-align: center;
        }

        .card-content h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #1a202c;
            font-weight: 700;
        }

        .card-content p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
            /* Batasi teks jadi 3 baris */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .btn-selengkapnya {
            display: inline-block;
            background: #ffc107;
            color: #333;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: background 0.3s;
        }

        .btn-selengkapnya:hover {
            background: #ffdb4d;
        }

        .meta-location {
            display: block;
            font-size: 12px;
            color: #009688;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .destinasi-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 768px) {
            .destinasi-grid { grid-template-columns: 1fr; }
            .banner-content h1 { font-size: 36px; }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <div class="logo">
                <h1><span class="wonderful">wonderful</span> indonesia</h1>
            </div>
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ route('home') }}">🏠 Beranda</a></li>
                    <li><a href="{{ route('profil.desa') }}">👤 Profil</a></li>
                    <li><a href="{{ route('wisata.index') }}" style="color: #00bcd4;">🏝️ Wisata</a></li>
                    <li><a href="#kebudayaan">🎭 Kebudayaan</a></li>
                    <li><a href="#">📰 Berita</a></li> 
                    <li><a href="#informasi">ℹ️ Informasi</a></li>
                    <li><a href="#galeri">📸 Galeri</a></li>
                    <li><a href="#kontak">📞 Kontak</a></li>
                    
                    <!-- SAYA SUDAH MENGHAPUS BAGIAN TOMBOL ADMIN DARI SINI -->
                </ul>
            </nav>
        </div>
    </header>

    <!-- Banner Halaman -->
    <div class="page-banner">
        <div class="banner-content">
            <h1>Destinasi Wisata</h1>
            <p>Temukan keindahan tersembunyi di Bolaang Mongondow</p>
        </div>
    </div>

    <!-- Konten Grid -->
    <div class="container">
        
        @if($destinations->count() > 0)
            <div class="destinasi-grid">
                @foreach($destinations as $destinasi)
                <div class="destinasi-card">
                    <!-- Gambar -->
                    <img src="{{ $destinasi->gambar_utama ? asset('uploads/'.$destinasi->gambar_utama) : 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=800' }}" alt="{{ $destinasi->judul }}">
                    
                    <div class="card-content">
                        <!-- Lokasi -->
                        <span class="meta-location">📍 {{ $destinasi->lokasi }}</span>
                        
                        <!-- Judul -->
                        <h3>{{ $destinasi->judul }}</h3>
                        
                        <!-- Deskripsi Singkat -->
                        <p>{{ $destinasi->deskripsi_singkat ?? Str::limit($destinasi->deskripsi, 100) }}</p>
                        
                        <!-- Tombol -->
                        <a href="{{ route('wisata.show', $destinasi->slug) }}" class="btn-selengkapnya">
                            Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 50px; color: #666;">
                <h3>Belum ada data destinasi wisata.</h3>
                <p>Silakan tambahkan data melalui panel admin.</p>
            </div>
        @endif

    </div>

</body>
</html>