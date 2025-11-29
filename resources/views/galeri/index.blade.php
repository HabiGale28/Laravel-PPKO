<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Wonderful Indonesia</title>
    <style>
        /* === 1. COPY STYLE GLOBAL === */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fff; color: #333; overflow-x: hidden; }

        /* Header Styling */
        .header {
            position: fixed; top: 0; width: 100%;
            background: rgba(0, 0, 0, 0.7); 
            backdrop-filter: blur(10px);
            padding: 15px 5%; z-index: 1000; transition: all 0.3s;
        }
        .nav-container { display: flex; justify-content: space-between; align-items: center; max-width: 1400px; margin: 0 auto; }
        .logo h1 { font-size: clamp(20px, 4vw, 24px); font-weight: 300; color: white; margin: 0; }
        .logo .wonderful { color: #00bcd4; font-weight: 700; }
        
        .nav-menu { display: flex; list-style: none; gap: 25px; align-items: center; margin: 0; padding: 0; }
        .nav-menu a { color: white; text-decoration: none; transition: color 0.3s; font-size: 14px; font-weight: 500; }
        .nav-menu a:hover { color: #00bcd4; }

        /* Hamburger Menu */
        .menu-toggle { display: none; flex-direction: column; cursor: pointer; gap: 5px; z-index: 1001; }
        .menu-toggle span { width: 30px; height: 3px; background-color: white; border-radius: 5px; transition: all 0.3s; }

        /* === 2. STYLE KHUSUS GALERI === */
        .page-banner {
            height: 50vh;
            min-height: 300px;
            background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=1920');
            background-size: cover; background-position: center;
            position: relative; display: flex; align-items: center; justify-content: center;
            text-align: center; margin-bottom: 50px; margin-top: 0;
        }
        .page-banner::before { 
            content:''; position:absolute; inset:0; 
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.8));
        }
        .banner-content { position: relative; z-index: 2; color: white; padding: 0 20px; }
        .banner-content h1 { font-size: clamp(36px, 5vw, 56px); font-weight: 700; margin-bottom: 10px; }
        .banner-content p { font-size: clamp(16px, 3vw, 18px); opacity: 0.9; }

        /* Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 5% 80px; }

        /* Album Grid - PERBAIKAN DISINI (3 Kolom) */
        .album-grid {
            display: grid;
            /* Memaksa 3 kolom, jika layar kecil jadi 1 */
            grid-template-columns: repeat(3, 1fr); 
            gap: 30px;
        }

        /* Album Card */
        .album-card {
            position: relative;
            height: 300px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            cursor: pointer;
            border: 1px solid #eee;
        }
        .album-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.2); }
        
        .album-card img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 0.5s;
        }
        .album-card:hover img { transform: scale(1.05); }

        /* Overlay Content */
        .album-overlay {
            position: absolute; bottom: 0; left: 0; right: 0;
            padding: 25px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            color: white;
            z-index: 2;
        }

        .album-count {
            display: inline-block;
            background: rgba(0, 188, 212, 0.8);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .album-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .btn-lihat-overlay {
            display: inline-block;
            font-size: 13px;
            color: #ddd;
            text-decoration: none;
            margin-top: 5px;
            border-bottom: 1px solid transparent;
            transition: all 0.3s;
        }
        .btn-lihat-overlay:hover { color: #00bcd4; border-color: #00bcd4; }

        /* Pagination & Responsive */
        .pagination-wrapper { margin-top: 50px; display: flex; justify-content: center; }
        .pagination-wrapper svg { width: 20px !important; height: 20px !important; }

        @media (max-width: 992px) { .album-grid { grid-template-columns: repeat(2, 1fr); } }
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

            .album-grid { grid-template-columns: 1fr; } /* 1 Kolom di HP */
            .page-banner { height: 40vh; }
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
                    <li><a href="{{ route('informasi.index') }}">ℹ️ Informasi</a></li>
                    <li><a href="{{ route('galeri.index') }}" style="color: #00bcd4;">📸 Galeri</a></li>
                    <li><a href="{{ route('kontak') }}">📞 Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-banner">
        <div class="banner-content">
            <h1>Galeri & Dokumentasi</h1>
            <p>Momen-momen indah yang terabadikan</p>
        </div>
    </div>

    <div class="container">
        
        <div class="album-grid">
            
            @forelse($albums ?? [] as $album)
                <div class="album-card">
                    <img src="{{ asset('uploads/albums/'.$album->cover_album) }}" alt="{{ $album->nama_album }}">
                    <div class="album-overlay">
                        <span class="album-count">📸 {{ $album->fotos_count ?? 0 }} Foto</span>
                        <div class="album-title">{{ $album->nama_album }}</div>
                        <a href="{{ route('galeri.show', $album->slug) }}" class="btn-lihat-overlay">Lihat Album &rarr;</a>
                    </div>
                </div>
            @empty
                
                <div class="album-card">
                    <img src="https://images.unsplash.com/photo-1544551763-46a42a463658?w=800" alt="Snorkeling">
                    <div class="album-overlay">
                        <span class="album-count">📸 12 Foto</span>
                        <div class="album-title">Keindahan Bawah Laut</div>
                        <a href="#" class="btn-lihat-overlay">Lihat Album &rarr;</a>
                    </div>
                </div>
                <div class="album-card">
                    <img src="https://images.unsplash.com/photo-1569383746724-6f1b882b8f46?w=800" alt="Nelayan">
                    <div class="album-overlay">
                        <span class="album-count">📸 8 Foto</span>
                        <div class="album-title">Aktivitas Nelayan</div>
                        <a href="#" class="btn-lihat-overlay">Lihat Album &rarr;</a>
                    </div>
                </div>
                <div class="album-card">
                    <img src="https://images.unsplash.com/photo-1596401057633-565652ca65a0?w=800" alt="Festival">
                    <div class="album-overlay">
                        <span class="album-count">📸 24 Foto</span>
                        <div class="album-title">Festival Adat 2024</div>
                        <a href="#" class="btn-lihat-overlay">Lihat Album &rarr;</a>
                    </div>
                </div>

            @endforelse

        </div> @if(isset($albums) && method_exists($albums, 'links'))
            <div class="pagination-wrapper">
                {{ $albums->links() }}
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