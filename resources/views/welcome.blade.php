<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampung Terapung Tihi - Tihi</title>
    <style>
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

        /* --- Header & Navigasi --- */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            padding: 15px 5%; /* Menggunakan % agar aman di berbagai layar */
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

        /* Menu Desktop Default */
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
            font-weight: 500;
        }

        .nav-menu a:hover {
            color: #00bcd4;
        }

        /* Hamburger Menu (Hidden on Desktop) */
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

        /* --- Hero Section --- */
        .hero {
            height: 100vh;
            min-height: 600px; /* Mencegah hero terlalu pendek di HP landscape */
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
            transition: background 1s ease;
            color: white;
            background-repeat: no-repeat;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            padding: 0 20px;
            width: 100%;
            transition: opacity 0.5s;
        }

        .hero-content.fade-out { opacity: 0; }
        .hero-content.fade-in { opacity: 1; }

        .location-tag {
            background: rgba(0, 188, 212, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 188, 212, 0.5);
            font-size: 14px;
        }

        .hero-title {
            font-size: 64px; /* Default Desktop */
            font-weight: 700;
            margin-bottom: 40px;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
            line-height: 1.2;
        }

        .stats-container {
            display: flex;
            gap: 50px;
            justify-content: center;
            flex-wrap: wrap; /* Agar bisa turun ke bawah jika sempit */
        }

        .stat-item { text-align: center; }
        .stat-number { font-size: 48px; font-weight: 700; color: #00bcd4; }
        .stat-label { font-size: 14px; color: rgba(255, 255, 255, 0.8); margin-top: 5px; }
        
        /* UI Elements (Buttons/Arrows) */
        .play-button {
            position: absolute; 
            right: 100px;
            top: 50%;
            transform: translateY(-50%); 
            width: 80px; 
            height: 80px;
            border-radius: 50%; 
            background: rgba(0, 188, 212, 0.3);
            backdrop-filter: blur(10px); 
            border: 2px solid #00bcd4;
            cursor: pointer; 
            transition: all 0.3s; 
            z-index: 3;
        }
        .play-button::after {
            content: '▶'; position: absolute; top: 50%; left: 55%;
            transform: translate(-50%, -50%); font-size: 24px; color: white;
        }
        .play-button:hover {
            background: rgba(0, 188, 212, 0.5);
            transform: translateY(-50%) scale(1.1);
        }

        .nav-arrow {
            position: absolute; top: 50%; transform: translateY(-50%);
            width: 50px; height: 50px; background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%; cursor: pointer; transition: all 0.3s; z-index: 3;
        }
        .nav-arrow::after {
            content: ''; position: absolute; top: 50%; left: 50%;
            transform: translate(-50%, -50%); width: 12px; height: 12px;
            border-top: 2px solid white; border-right: 2px solid white;
        }
        .nav-arrow.left { left: 40px; }
        .nav-arrow.left::after { transform: translate(-30%, -50%) rotate(-135deg); }
        .nav-arrow.right { right: 40px; }
        .nav-arrow.right::after { transform: translate(-70%, -50%) rotate(45deg); }
        .nav-arrow:hover { background: rgba(255, 255, 255, 0.2); }

        .page-counter {
            position: absolute; bottom: 40px; left: 50%;
            transform: translateX(-50%); z-index: 3; font-size: 18px;
        }
        .page-counter .current { font-size: 32px; font-weight: 700; color: #00bcd4; }

        .social-icons {
            position: absolute; 
            right: 40px;
            bottom: 40px; 
            display: flex;
            flex-direction: row;
            gap: 20px;
            z-index: 100;
        }
        .social-icon {
            width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%; display: flex; align-items: center;
            justify-content: center; color: white; text-decoration: none;
            transition: all 0.3s;
        }
        .social-icon:hover { background: rgba(0, 188, 212, 0.5); border-color: #00bcd4; }

        /* --- Content Styling --- */
        .content-section {
            background: #fff;
            padding: 80px 5%; /* Responsive Padding */
            color: #333;
        }
        .content-section.dark-bg {
             background: #0d1a2c;
             color: white;
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
        .content-section h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 40px;
            color: #1a202c;
        }
        .content-section.dark-bg h2 { color: white; }
        .section-title-center { text-align: center; }

        /* About Section */
        .about-section .container {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        .about-content { flex: 1; }
        .about-content h2 { font-size: 42px; line-height: 1.3; }
        .about-content p {
            font-size: 16px; line-height: 1.7; margin: 20px 0 30px; color: #555;
        }
        .btn-selengkapnya {
            background: #ffc107; color: #333; padding: 12px 24px;
            border-radius: 25px; text-decoration: none; font-weight: 600;
            display: inline-block; transition: all 0.3s;
        }
        .about-video { flex: 1; position: relative; cursor: pointer; }
        .about-video img { width: 100%; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.2); }
        .play-button-small {
            position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
            width: 80px; height: 80px; border-radius: 50%;
            background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px);
            border: 2px solid white; transition: all 0.3s;
        }
        .play-button-small::after {
            content: '▶'; font-size: 24px; color: white;
            position: absolute; top: 50%; left: 55%; transform: translate(-50%, -50%);
        }

        /* Experience Section */
        .experience-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            text-align: center;
        }
        .experience-item { padding: 20px; }
        .experience-item .icon {
            width: 80px; height: 80px; margin: 0 auto 20px; background: #00bcd4;
            border-radius: 20px; display: flex; align-items: center;
            justify-content: center; font-size: 36px;
        }
        .experience-item h3 { font-size: 24px; margin-bottom: 10px; color: white; }
        .experience-item p { font-size: 15px; line-height: 1.6; color: #ddd; }

        /* Grid & Cards */
        .grid-container { display: grid; gap: 30px; }
        .destinasi-grid { grid-template-columns: repeat(3, 1fr); }
        .berita-grid { grid-template-columns: repeat(2, 1fr); }

        .destinasi-card {
            background: #fff; border-radius: 15px; overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s;
        }
        .destinasi-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.12); }
        .destinasi-card img { width: 100%; height: 250px; object-fit: cover; }
        .destinasi-card .card-content { padding: 25px; }
        .destinasi-card h3 { font-size: 22px; margin-bottom: 10px; color: #1a202c; }
        .destinasi-card p { font-size: 14px; color: #666; line-height: 1.6; margin-bottom: 15px; }
        .destinasi-card span { font-size: 14px; font-weight: 600; color: #009688; }

        .berita-card {
            position: relative; border-radius: 15px; overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s;
        }
        .berita-card:hover { transform: translateY(-5px); }
        .berita-card img { width: 100%; height: 300px; object-fit: cover; display: block; }
        .berita-card .card-overlay {
            position: absolute; bottom: 0; left: 0; right: 0; padding: 25px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: white;
        }
        .berita-card h3 { font-size: 24px; font-weight: 600; }
        .berita-tag {
            background: #ffc107; color: #333; padding: 5px 10px; font-size: 12px;
            font-weight: 600; border-radius: 5px; margin-bottom: 10px; display: inline-block;
        }

        /* Popup Video */
        .video-popup {
            display: none; position: fixed; top: 0; left: 0;
            width: 100%; height: 100%; background: rgba(0, 0, 0, 0.95);
            z-index: 2000; justify-content: center; align-items: center;
        }
        .video-popup.active { display: flex; }
        .video-container { position: relative; width: 90%; max-width: 1200px; }
        .video-container video { width: 100%; border-radius: 10px; }
        .close-button {
            position: absolute; top: -50px; right: 0; width: 40px; height: 40px;
            background: rgba(255, 255, 255, 0.1); border: 1px solid white; border-radius: 50%;
            color: white; font-size: 24px; cursor: pointer; transition: all 0.3s;
        }
        .close-button:hover { background: rgba(255, 255, 255, 0.2); transform: rotate(90deg); }

        /* ============================ */
        /* === RESPONSIVE MEDIA QUERIES === */
        /* ============================ */
        
        /* Laptop & Tablet Landscape (Max 1024px) */
        @media (max-width: 1024px) {
            .hero-title { font-size: 48px; }
            .about-section .container { flex-direction: column; }
            .about-content h2 { font-size: 36px; text-align: center; }
            .about-content p { text-align: center; }
            .about-content { text-align: center; }
            
            .play-button {
                right: 50px; width: 60px; height: 60px;
            }
        }

        /* Tablet Portrait (Max 768px) */
        @media (max-width: 768px) {
            /* Navbar Mobile (Hamburger) */
            .menu-toggle { display: flex; }
            
            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%; /* Sembunyi di kanan */
                height: 100vh;
                width: 75%;
                background: rgba(13, 26, 44, 0.95);
                backdrop-filter: blur(10px);
                flex-direction: column;
                justify-content: center;
                transition: 0.4s ease;
                box-shadow: -5px 0 15px rgba(0,0,0,0.3);
            }

            .nav-menu.active {
                right: 0; /* Muncul ke layar */
            }

            .nav-menu li {
                margin: 15px 0;
            }

            .nav-menu a {
                font-size: 18px;
            }

            /* Hero Adjustments */
            .hero-title { font-size: 42px; margin-bottom: 20px; }
            .stats-container { gap: 20px; }
            .stat-number { font-size: 36px; }
            
            /* Grid Menjadi 1 Kolom */
            .experience-grid, .destinasi-grid, .berita-grid {
                grid-template-columns: 1fr;
            }

            /* Elements Position */
            .play-button {
                top: auto;
                bottom: 120px;
                right: 50%;
                transform: translateX(50%);
            }
            
            .nav-arrow.left { left: 10px; }
            .nav-arrow.right { right: 10px; }
            .social-icons { display: none; } /* Sembunyikan social icons di mobile agar bersih */
            
            .close-button { top: -45px; right: 0; }
        }

        /* Mobile Phones (Max 480px) */
        @media (max-width: 480px) {
            .logo h1 { font-size: 20px; }
            .hero-title { font-size: 32px; }
            .content-section { padding: 50px 20px; }
            .content-section h2 { font-size: 28px; }
            .about-content h2 { font-size: 28px; }
            
            .stat-item { flex-basis: 100%; margin-bottom: 15px; } /* Stack stats vertically */
            
            .berita-card img { height: 200px; }
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
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav>
                <ul class="nav-menu" id="navMenu">
                    <li><a href="{{ route('home') }}" style="color: #00bcd4;">🏠 Beranda</a></li>
                    <li><a href="{{ route('profil.desa') }}">👤 Profil</a></li>
                    <li><a href="{{ route('wisata.index') }}">🏝️ Wisata</a></li>
                    <li><a href="{{ route('kebudayaan.index') }}">🎭 Kebudayaan</a></li>
                    <li><a href="{{ route('informasi.index') }}">ℹ️ Informasi</a></li>
                    <li><a href="{{ route('galeri.index') }}">📸 Galeri</a></li>
                    <li><a href="{{ route('kontak') }}">📞 Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <div class="location-tag">Lokasi Awal</div>
            <h1 class="hero-title">Judul Awal</h1>
            
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Destinasi terbaik</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Kesenian & Kebudayaan</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Event menarik</div>
                </div>
            </div>
        </div>

        <!-- <button class="play-button" onclick="openVideoPopup()"></button> -->
        <button class="nav-arrow left" onclick="previousSlide()"></button>
        <button class="nav-arrow right" onclick="nextSlide()"></button>

        <div class="page-counter">
            <span class="current">01</span> / 05
        </div>

        <div class="social-icons">
            <a href="#" class="social-icon">f</a>
            <a href="#" class="social-icon">🐦</a>
            <a href="#" class="social-icon">📷</a>
        </div>

    </section>
    
    <section class="content-section about-section">
        <div class="container">
            <div class="about-content">
                <h2>Tentang Kampung terapung <br>Di kota Bontang</h2>
                <p>Kampung Terapung Tihi-Tihi adalah permukiman unik di atas laut Selat Makassar yang dihuni 280 jiwa sejak 1957, menawarkan pengalaman autentik kehidupan nelayan dengan jalan kayu ulin sepanjang 1 km, snorkeling, kuliner laut segar, dan keramahan masyarakat yang legendaris.</p>
                <a href="{{ route('profil.desa') }}" class="btn-selengkapnya">Selengkapnya →</a>
            </div>
            <!-- <div class="about-video" onclick="openVideoPopup()">
                <img src="https://images.unsplash.com/photo-1507525428034-b723a9ce6890?w=1200" alt="Video thumbnail pantai">
                <div class="play-button-small"></div>
            </div> -->
        </div>
    </section>

    <section class="content-section dark-bg">
        <div class="container">
            <div class="experience-grid">
                <div class="experience-item">
                    <div class="icon">⛵</div>
                    <h3>Perahu</h3>
                    <p>Perairan jernih di sekitar kampung menjadi surga bagi pecinta snorkeling, dengan terumbu karang yang masih terjaga dan ikan-ikan berwarna-warni yang berenang bebas.</p>
                </div>
                <div class="experience-item">
                    <div class="icon">🗺️</div>
                    <h3>Experience</h3>
                    <p>Menawarkan pengalaman autentik kehidupan nelayan yang menyatu dengan alam, memberikan wawasan baru tentang budaya maritim.</p>
                </div>
                <div class="experience-item">
                    <div class="icon">🏖️</div>
                    <h3>Relax</h3>
                    <p>Rasakan ketenangan di Kampung Wisata Tihi-Tihi dengan suasana pantai yang damai, angin sepoi-sepoi, dan panorama laut yang menyejukkan.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content-section">
        <div class="container">
            <h2 class="section-title-center">Destinasi terbaik sudah menunggu!</h2>
            <div class="grid-container destinasi-grid">
                
                @forelse($latest_destinations ?? [] as $destinasi)
                <div class="destinasi-card">
                    <img src="{{ $destinasi->gambar_utama ? asset('uploads/' . $destinasi->gambar_utama) : 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=800' }}" alt="{{ $destinasi->judul }}">
                    <div class="card-content">
                        <h3>{{ $destinasi->judul }}</h3>
                        <p>{{ Str::limit($destinasi->deskripsi, 100) }}</p>
                        <span>📍 {{ $destinasi->lokasi }}</span>
                    </div>
                </div>
                @empty
                <div class="destinasi-card">
                    <img src="https://images.unsplash.com/photo-1544551763-46a42a463658?w=800" alt="Wisata">
                    <div class="card-content">
                        <h3>Wisata Terumbu Karang</h3>
                        <p>Nikmati keindahan bawah laut dengan snorkeling di spot terbaik kampung Tihi-Tihi.</p>
                        <span>📍 Perairan Tihi-Tihi</span>
                    </div>
                </div>
                <div class="destinasi-card">
                    <img src="https://images.unsplash.com/photo-1519046904884-53103b34b206?w=800" alt="Wisata">
                    <div class="card-content">
                        <h3>Kuliner Laut Segar</h3>
                        <p>Nikmati hidangan laut yang baru saja ditangkap oleh nelayan lokal.</p>
                        <span>📍 Pusat Kuliner</span>
                    </div>
                </div>
                <div class="destinasi-card">
                    <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=800" alt="Wisata">
                    <div class="card-content">
                        <h3>Sunset Point</h3>
                        <p>Tempat terbaik untuk menikmati matahari terbenam di ufuk barat.</p>
                        <span>📍 Dermaga Utama</span>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </section>

    <section class="content-section dark-bg">
        <div class="container">
            <h2 class="section-title-center">Berita dari kampung Tihi-Tihi</h2>
            <div class="grid-container berita-grid">

                @forelse($latest_berita ?? [] as $news)
                <div class="berita-card">
                    <img src="{{ $news->gambar ? asset('uploads/' . $news->gambar) : 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=800' }}" alt="{{ $news->judul }}">
                    <div class="card-overlay">
                        <span class="berita-tag">Berita</span>
                        <h3>{{ $news->judul }}</h3>
                    </div>
                </div>
                @empty
                <div class="berita-card">
                    <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=800" alt="Berita">
                    <div class="card-overlay">
                        <span class="berita-tag">Update</span>
                        <h3>Peresmian Dermaga Baru Tihi-Tihi</h3>
                    </div>
                </div>
                <div class="berita-card">
                    <img src="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?w=800" alt="Berita">
                    <div class="card-overlay">
                        <span class="berita-tag">Event</span>
                        <h3>Festival Laut Tahunan Segera Digelar</h3>
                    </div>
                </div>
                @endforelse

            </div>
        </div>
    </section>


    <div class="video-popup" id="videoPopup">
        <div class="video-container">
            <button class="close-button" onclick="closeVideoPopup()">×</button>
            <video id="promoVideo" controls>
                <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
            </video>
        </div>
    </div>

        <script>
        // === TOGGLE MOBILE MENU ===
        function toggleMenu() {
            const nav = document.getElementById('navMenu');
            const toggle = document.querySelector('.menu-toggle');
            nav.classList.toggle('active');
            
            // Animasi ikon hamburger menjadi X (opsional)
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

        // Tutup menu saat link diklik
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('navMenu').classList.remove('active');
                // Reset icon
                const spans = document.querySelector('.menu-toggle').querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });

        // === SLIDER LOGIC ===
        const destinations = @json($sliders ?? []);

        const totalSlides = destinations.length > 0 ? destinations.length : 1;
        let currentSlide = 1;
        let isTransitioning = false;

        function updateSlideContent(slideIndex) {
            if (isTransitioning) return;
            
            if (destinations.length === 0) {
                // Set default jika tidak ada data dari backend
                document.querySelector('.page-counter').innerHTML = `<span class="current">01</span> / 01`;
                document.querySelector('.hero-title').textContent = "Selamat Datang";
                document.querySelector('.location-tag').textContent = "Kampung Wisata";
                document.querySelector('.hero').style.backgroundImage = `url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920')`;
                return;
            }

            isTransitioning = true;
            
            const destination = destinations[slideIndex - 1];
            const hero = document.querySelector('.hero');
            const content = document.querySelector('.hero-content');
            
            content.classList.add('fade-out');
            
            setTimeout(() => {
                document.querySelector('.location-tag').textContent = destination.lokasi || 'Lokasi';
                document.querySelector('.hero-title').textContent = destination.judul;
                
                // Update Statistik (Dummy logic, sesuaikan dengan data asli jika ada)
                const statNumbers = document.querySelectorAll('.stat-number');
                if(statNumbers.length > 0) {
                    statNumbers[0].textContent = Math.floor(Math.random() * 10) + 1; 
                    statNumbers[1].textContent = Math.floor(Math.random() * 5) + 1;
                    statNumbers[2].textContent = Math.floor(Math.random() * 3) + 1;
                }
                
                document.querySelector('.page-counter .current').textContent = slideIndex.toString().padStart(2, '0');
                
                // Cek path gambar
                const imageUrl = `{{ asset('uploads/sliders') }}/${destination.gambar}`;
                hero.style.backgroundImage = `url('${imageUrl}')`;
                
                content.classList.remove('fade-out');
                content.classList.add('fade-in');
                
                setTimeout(() => {
                    isTransitioning = false;
                    content.classList.remove('fade-in');
                }, 500);
            }, 250);
        }

        function nextSlide() {
            if (isTransitioning || destinations.length === 0) return;
            currentSlide = currentSlide >= totalSlides ? 1 : currentSlide + 1;
            updateSlideContent(currentSlide);
        }

        function previousSlide() {
            if (isTransitioning || destinations.length === 0) return;
            currentSlide = currentSlide <= 1 ? totalSlides : currentSlide - 1;
            updateSlideContent(currentSlide);
        }

        function openVideoPopup() {
            document.getElementById('videoPopup').classList.add('active');
            document.getElementById('promoVideo').play();
        }

        function closeVideoPopup() {
            const popup = document.getElementById('videoPopup');
            const video = document.getElementById('promoVideo');
            popup.classList.remove('active');
            video.pause();
            video.currentTime = 0;
        }

        document.getElementById('videoPopup').addEventListener('click', function(e) {
            if (e.target === this) closeVideoPopup();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeVideoPopup();
            if (e.key === 'ArrowRight') nextSlide();
            if (e.key === 'ArrowLeft') previousSlide();
        });

        let autoSlideInterval = setInterval(nextSlide, 5000);

        function pauseAutoSlide() {
            clearInterval(autoSlideInterval);
            setTimeout(() => {
                autoSlideInterval = setInterval(nextSlide, 5000);
            }, 10000);
        }

        document.querySelector('.nav-arrow.left').addEventListener('click', pauseAutoSlide);
        document.querySelector('.nav-arrow.right').addEventListener('click', pauseAutoSlide);

        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.style.background = 'rgba(0, 0, 0, 0.9)';
                header.style.padding = '10px 5%'; // Shrink header
            } else {
                header.style.background = 'rgba(0, 0, 0, 0.7)';
                header.style.padding = '15px 5%';
            }
        });

        window.addEventListener('load', function() {
            if(destinations.length > 0){
                 document.querySelector('.page-counter').innerHTML = 
                `<span class="current">01</span> / ${totalSlides.toString().padStart(2, '0')}`;
                updateSlideContent(1);
            } else {
                // Inisialisasi tampilan default jika slider kosong
                updateSlideContent(1);
            }
        });
    </script>
</body>
</html>