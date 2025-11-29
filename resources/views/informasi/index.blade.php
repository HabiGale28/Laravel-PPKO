<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi - Wonderful Indonesia</title>
    <style>
        /* =========================================
           RESET & GLOBAL STYLES
           ========================================= */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f9f9f9; color: #333; overflow-x: hidden; }
        
        /* =========================================
           HEADER & NAV (KONSISTEN)
           ========================================= */
        .header {
            position: fixed; top: 0; width: 100%;
            background: rgba(0, 0, 0, 0.8); 
            backdrop-filter: blur(10px);
            padding: 15px 5%; z-index: 1000; transition: all 0.3s;
        }
        .nav-container {
            display: flex; justify-content: space-between; align-items: center;
            max-width: 1400px; margin: 0 auto;
        }
        .logo h1 { font-size: clamp(20px, 4vw, 24px); color: white; margin:0; font-weight: 300; } 
        .logo .wonderful { color: #00bcd4; font-weight: 700; }
        
        .nav-menu { display: flex; gap: 25px; list-style: none; margin:0; padding:0; align-items: center; }
        .nav-menu a { color: white; text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.3s; }
        .nav-menu a:hover { color: #00bcd4; }

        /* Hamburger Menu */
        .menu-toggle { display: none; flex-direction: column; cursor: pointer; gap: 5px; z-index: 1001; }
        .menu-toggle span { width: 30px; height: 3px; background-color: white; border-radius: 5px; transition: all 0.3s; }

        /* =========================================
           BANNER
           ========================================= */
        .page-banner {
            height: 45vh;
            min-height: 300px;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.8)), url('https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1920');
            background-size: cover; background-position: center;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center; color: white; margin-bottom: 50px; margin-top: 0;
        }
        .banner-title h1 { font-size: clamp(32px, 5vw, 48px); margin-bottom: 10px; font-weight: 700; }
        .banner-title p { font-size: clamp(16px, 3vw, 18px); opacity: 0.9; }

        /* =========================================
           CONTAINER & HEADINGS
           ========================================= */
        .container { max-width: 1140px; margin: 0 auto; padding: 0 5% 80px; }
        .section-header { margin-bottom: 30px; border-left: 5px solid #00bcd4; padding-left: 15px; }
        .section-header h2 { font-size: 24px; margin: 0; color: #2c3e50; font-weight: 700; }

        /* =========================================
           1. PENGUMUMAN STYLE
           ========================================= */
        .pengumuman-list { display: flex; flex-direction: column; gap: 20px; margin-bottom: 60px; }
        .pengumuman-card { 
            background: white; border-radius: 8px; overflow: hidden; display: flex; 
            box-shadow: 0 2px 15px rgba(0,0,0,0.05); transition: transform 0.3s; border: 1px solid #eee;
        }
        .pengumuman-card:hover { transform: translateY(-3px); box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .p-date { 
            background: #00bcd4; color: white; min-width: 100px; 
            display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 15px; 
        }
        .p-content { padding: 25px; flex: 1; }
        .p-title { font-size: 18px; font-weight: 700; margin-bottom: 10px; color: #333; }
        .btn-read { color: #00bcd4; text-decoration: none; font-weight: 600; font-size: 13px; }

        /* =========================================
           2. EVENT STYLE
           ========================================= */
        .event-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); /* Responsive Grid */
            gap: 30px; margin-bottom: 60px; 
        }
        .event-card { 
            background: #1e293b; color: white; border-radius: 12px; overflow: hidden; 
            display: flex; height: 200px; transition: transform 0.3s; 
        }
        .event-card:hover { transform: translateY(-5px); }
        .event-img { width: 40%; background-size: cover; background-position: center; }
        .event-info { padding: 20px; width: 60%; display: flex; flex-direction: column; justify-content: center; }
        .event-title { 
            font-size: 18px; font-weight: bold; margin-bottom: 10px; line-height: 1.4; 
            color: white; text-decoration: none; 
        }

        /* =========================================
           3. BERITA STYLE
           ========================================= */
        .berita-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Responsive Grid */
            gap: 30px; 
        }
        .berita-card { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); border: 1px solid #eee; }
        .berita-thumb { width: 100%; height: 200px; object-fit: cover; }
        .berita-body { padding: 20px; }
        .berita-title { font-size: 16px; font-weight: 700; margin-bottom: 10px; line-height: 1.4; }
        .berita-title a { text-decoration: none; color: #333; transition: color 0.3s; }
        .berita-title a:hover { color: #00bcd4; }

        /* =========================================
           RESPONSIVE MEDIA QUERIES
           ========================================= */
        @media (max-width: 768px) {
            /* Mobile Nav */
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

            /* Content Layouts */
            .event-grid, .berita-grid { grid-template-columns: 1fr; } /* 1 Kolom di HP */
            
            /* Event Card Stack Vertically on Mobile */
            .event-card { flex-direction: column; height: auto; }
            .event-img { width: 100%; height: 180px; }
            .event-info { width: 100%; }

            /* Pengumuman Date Smaller */
            .p-date { min-width: 80px; padding: 10px; }
            .p-content { padding: 15px; }
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
                    <li><a href="{{ route('kebudayaan.index') }}">🎭 Kebudayaan</a></li>
                    <li><a href="{{ route('informasi.index') }}" style="color: #00bcd4;">ℹ️ Informasi</a></li>
                    <li><a href="{{ route('galeri.index') }}">📸 Galeri</a></li>
                    <li><a href="{{ route('kontak') }}">📞 Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-banner">
        <div class="banner-title">
            <h1>Pusat Informasi</h1>
            <p>Pengumuman, Event, dan Berita Terkini</p>
        </div>
    </div>

    <div class="container">
        
        <!-- 1. SECTION PENGUMUMAN -->
        <div class="section-header">
            <h2>Pengumuman Terbaru</h2>
        </div>
        <div class="pengumuman-list">
            @foreach($pengumuman as $item)
            <div class="pengumuman-card">
                <div class="p-date">
                    <span style="font-size: 28px; font-weight: bold;">{{ \Carbon\Carbon::parse($item->tanggal_publish)->format('d') }}</span>
                    <span style="font-size: 12px; text-transform: uppercase;">{{ \Carbon\Carbon::parse($item->tanggal_publish)->format('M Y') }}</span>
                </div>
                <div class="p-content">
                    <div class="p-title">{{ $item->judul }}</div>
                    <p style="font-size: 14px; color: #666; margin-bottom: 10px;">{{ Str::limit(strip_tags($item->konten), 150) }}</p>
                    <a href="{{ route('informasi.pengumuman.show', $item->slug) }}" class="btn-read">Selengkapnya &rarr;</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- 2. SECTION EVENT -->
        <div class="section-header">
            <h2>Agenda Event</h2>
        </div>
        <div class="event-grid">
            @foreach($event as $item)
            <div class="event-card">
                <div class="event-img" style="background-image: url('{{ $item->gambar ? asset('uploads/event/'.$item->gambar) : 'https://via.placeholder.com/400x300?text=Event' }}');"></div>
                <div class="event-info">
                    <div style="color: #00bcd4; font-size: 13px; font-weight: 600; margin-bottom: 8px;">
                        📅 {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                    </div>
                    <!-- LINK KE DETAIL EVENT -->
                    <a href="{{ route('informasi.event.show', $item->slug) }}" class="event-title">{{ $item->judul }}</a>
                    <div style="font-size: 13px; color: #94a3b8; margin-top: 5px;">📍 {{ $item->lokasi ?? 'Online' }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- 3. SECTION BERITA -->
        <div class="section-header">
            <h2>Berita & Artikel</h2>
        </div>
        <div class="berita-grid">
            @foreach($berita as $item)
            <div class="berita-card">
                <img src="{{ $item->gambar ? asset('uploads/berita/'.$item->gambar) : 'https://via.placeholder.com/400x250?text=News' }}" class="berita-thumb">
                <div class="berita-body">
                    <div style="font-size: 12px; color: #888; margin-bottom: 10px;">{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</div>
                    <h3 class="berita-title">
                        <a href="{{ route('informasi.berita.show', $item->slug) }}">{{ $item->judul }}</a>
                    </h3>
                    <a href="{{ route('informasi.berita.show', $item->slug) }}" class="btn-read">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>

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