<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seni dan Kebudayaan - Wonderful Indonesia</title>
    <style>
        /* =========================================
           RESET & GLOBAL STYLES
           ========================================= */
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

        /* =========================================
           HEADER (RESPONSIVE)
           ========================================= */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7); 
            backdrop-filter: blur(10px);
            padding: 15px 5%; /* Responsive Padding */
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
            font-size: clamp(20px, 4vw, 24px);
            font-weight: 300;
            color: white;
            white-space: nowrap;
        }

        .logo .wonderful {
            color: #00bcd4;
            font-weight: 700;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 25px;
            align-items: center;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-menu a:hover {
            color: #00bcd4;
        }

        /* Hamburger Menu */
        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            z-index: 1001;
        }
        .menu-toggle span {
            width: 30px;
            height: 3px;
            background-color: white;
            border-radius: 5px;
            transition: all 0.3s;
        }

        /* =========================================
           STYLE KHUSUS HALAMAN KEBUDAYAAN
           ========================================= */

        /* Banner */
        .page-banner {
            height: 50vh;
            min-height: 300px;
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
            margin-top: 0;
        }
        .page-banner::before { 
            content:''; 
            position:absolute; 
            inset:0; 
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.8));
        }
        .banner-content { 
            position: relative; z-index: 2; color: white; padding: 0 20px;
        }
        .banner-content h1 { 
            font-size: clamp(36px, 5vw, 56px);
            font-family: serif; 
            margin-bottom: 10px; 
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        .banner-content p { 
            font-size: clamp(16px, 3vw, 18px);
            letter-spacing: 1px; 
            opacity: 0.9; 
        }

        /* Container & Grid */
        .container { 
            max-width: 1200px; margin: 0 auto; padding: 0 5% 80px; 
        }
        
        .culture-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        /* Card Style (Overlay Text Clean) */
        .culture-card {
            position: relative;
            height: 350px;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .culture-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 15px 30px rgba(0,0,0,0.2); 
        }
        .culture-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .culture-card:hover img {
            transform: scale(1.05);
        }
        
        /* Overlay Text */
        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            color: white;
            z-index: 2;
        }
        .card-category {
            font-size: 11px;
            display: inline-block;
            background: #ffc107;
            color: #333;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .card-title {
            font-size: 20px;
            font-weight: 700;
            font-family: serif;
            line-height: 1.3;
            margin-bottom: 5px;
            color: white;
            text-shadow: 0 2px 4px rgba(0,0,0,0.6);
        }
        .card-desc {
            font-size: 13px;
            opacity: 0.9;
            color: #ddd;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }

        /* Responsive Media Query */
        @media (max-width: 768px) {
            .menu-toggle { display: flex; }
            .nav-menu {
                position: fixed; top: 0; right: -100%;
                height: 100vh; width: 75%;
                background: rgba(13, 26, 44, 0.98);
                backdrop-filter: blur(10px);
                flex-direction: column; justify-content: center;
                transition: 0.4s ease; box-shadow: -5px 0 15px rgba(0,0,0,0.3);
            }
            .nav-menu.active { right: 0; }
            .nav-menu li { margin: 15px 0; }
            .nav-menu a { font-size: 18px; }

            .culture-grid { grid-template-columns: 1fr; } 
            .page-banner { height: 40vh; }
            .culture-card { height: 280px; }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="nav-container">
            <div class="logo">
                <h1><span class="wonderful">Kampung Terapung</span> Tihi - Tihi</h1>
            </div>
            
            <div class="menu-toggle" onclick="toggleMenu()">
                <span></span><span></span><span></span>
            </div>

            <nav>
                <ul class="nav-menu" id="navMenu">
                    <li><a href="{{ route('home') }}">🏠 Beranda</a></li>
                    <li><a href="{{ route('profil.desa') }}">👤 Profil</a></li>
                    <li><a href="{{ route('wisata.index') }}">🏝️ Wisata</a></li>
                    <li><a href="{{ route('kebudayaan.index') }}" style="color: #00bcd4;">🎭 Kebudayaan</a></li>
                    <li><a href="{{ route('informasi.index') }}">ℹ️ Informasi</a></li>
                    <li><a href="{{ route('galeri.index') }}">📸 Galeri</a></li>
                    <li><a href="{{ route('kontak') }}">📞 Kontak</a></li>
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

    <script>
        function toggleMenu() {
            const nav = document.getElementById('navMenu');
            const toggle = document.querySelector('.menu-toggle');
            nav.classList.toggle('active');
            
            const spans = toggle.querySelectorAll('span');
            if(nav.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 6px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(5px, -6px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        }
        
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.style.background = 'rgba(0, 0, 0, 0.9)';
            } else {
                header.style.background = 'rgba(0, 0, 0, 0.7)';
            }
        });
    </script>

</body>
</html>