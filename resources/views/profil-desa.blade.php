<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kampung - Wonderful Indonesia</title>
    
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
            background: #fff;
            color: #333;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* =========================================
           HEADER & NAVIGATION (SAMA DENGAN WELCOME)
           ========================================= */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            padding: 15px 5%;
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

        /* Menu Desktop */
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

        /* Hamburger Menu (Mobile) */
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
           PAGE SPECIFIC: PROFIL HERO
           ========================================= */
        .profil-hero {
            height: 60vh;
            min-height: 400px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://foto.kontan.co.id/XWDrCNQ9WSvcXzPV0PkUIJHgZCs=/smart/2024/09/15/447037181p.jpg'); 
            background-size: cover;
            background-position: center;
            color: white;
            /* Margin top dihapus agar gambar full ke atas di belakang transparan header */
            margin-top: 0; 
        }

        .profil-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.8));
        }

        .profil-hero h1 {
            font-size: clamp(36px, 6vw, 64px); /* Responsive Font */
            font-weight: 700;
            z-index: 2;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
            text-align: center;
            padding: 0 20px;
        }

        /* =========================================
           CONTENT SECTIONS
           ========================================= */
        .content-section {
            background: #fff; 
            padding: 80px 5%; /* Responsive padding */
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

        /* Grid Layout Profil & Sejarah */
        .profil-content .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Default 2 Kolom */
            gap: 60px;
            align-items: start;
        }

        .profil-column, .sejarah-column {
            background: rgba(255, 255, 255, 0.05); /* Sedikit efek kartu */
            padding: 30px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .profil-content h2 {
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #00bcd4;
            display: inline-block;
        }

        .profil-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #d1d5db; /* Warna abu terang agar enak dibaca di background gelap */
            margin-bottom: 20px;
            text-align: justify; /* Rata kanan kiri agar rapi */
        }

        /* =========================================
           RESPONSIVE MEDIA QUERIES
           ========================================= */
        
        /* Tablet & Mobile (Max 992px) */
        @media (max-width: 992px) {
            .profil-content .container {
                grid-template-columns: 1fr; /* Jadi 1 kolom */
                gap: 40px;
            }
            .profil-column, .sejarah-column {
                padding: 20px; /* Padding lebih kecil */
            }
        }

        /* Mobile Portrait (Max 768px) */
        @media (max-width: 768px) {
            /* Header Mobile */
            .menu-toggle { display: flex; }
            
            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                height: 100vh;
                width: 75%;
                background: rgba(13, 26, 44, 0.98);
                backdrop-filter: blur(10px);
                flex-direction: column;
                justify-content: center;
                transition: 0.4s ease;
                box-shadow: -5px 0 15px rgba(0,0,0,0.3);
            }

            .nav-menu.active { right: 0; }
            .nav-menu li { margin: 15px 0; }
            .nav-menu a { font-size: 18px; }

            /* Content Adjustments */
            .content-section { padding: 60px 20px; }
            .profil-hero { height: 50vh; }
            
            .profil-content h2 { font-size: 28px; }
            .profil-content p { font-size: 15px; }
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
                    <li><a href="{{ route('home') }}">🏠 Beranda</a></li>
                    <li><a href="{{ route('profil.desa') }}" style="color: #00bcd4;">👤 Profil</a></li>
                    <li><a href="{{ route('wisata.index') }}">🏝️ Wisata</a></li>
                    <li><a href="{{ route('kebudayaan.index') }}">🎭 Kebudayaan</a></li>
                    <li><a href="{{ route('informasi.index') }}">ℹ️ Informasi</a></li>
                    <li><a href="{{ route('galeri.index') }}">📸 Galeri</a></li>
                    <li><a href="{{ route('kontak') }}">📞 Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="profil-hero">
        <h1>Profil Kampung</h1>
    </section>

    <section class="content-section dark-bg profil-content">
        <div class="container">
            <div class="profil-column">
                <h2>Profil Kampung</h2>
                <p>
                    Kampung Tihi-Tihi adalah permukiman pesisir yang terletak di Kelurahan Bontang Lestari, Kecamatan Bontang Selatan, Kota Bontang, Kalimantan Timur. Kampung ini berada di atas perairan Selat Makassar dengan bentuk permukiman terapung yang menjadi ciri khas dan daya tarik utamanya. Luas wilayahnya relatif kecil, namun dihuni oleh komunitas nelayan yang hidup berdampingan dengan laut sebagai sumber penghidupan utama.
                </p>
                <p>
                    Penduduk Kampung Tihi-Tihi umumnya bekerja sebagai nelayan tradisional dan petani rumput laut. Kegiatan harian mereka dipengaruhi kondisi perairan, pasang surut, serta musim tangkap, sehingga budaya maritim sangat melekat dalam kehidupan masyarakat.
                </p>
                <p>
                    Selain sektor perikanan, Kampung Tihi-Tihi memiliki potensi besar di bidang wisata bahari. Keindahan rumah panggung di atas laut, suasana pesisir yang tenang, serta keberadaan biota laut dan terumbu karang menjadikannya lokasi yang berpotensi berkembang sebagai destinasi wisata edukasi dan konservasi.
                </p>
            </div>
            
            <div class="sejarah-column">
                <h2>Sejarah Kampung</h2>
                <p>
                    Kampung Tihi-Tihi merupakan permukiman pesisir yang berdiri di atas perairan Selat Makassar di Kelurahan Bontang Lestari, Kota Bontang. Kampung ini berawal dari kedatangan kelompok nelayan yang membangun rumah panggung di atas laut agar dekat dengan wilayah tangkapan ikan. Seiring waktu, permukiman ini berkembang menjadi komunitas yang hidup dari perikanan dan budidaya rumput laut.
                </p>
                <p>
                    Keunikan rumah terapung dan aktivitas masyarakat yang lekat dengan laut menjadikan Kampung Tihi-Tihi memiliki karakter khas yang tidak dimiliki daerah lain. Lingkungan perairannya yang masih alami juga menyimpan potensi terumbu karang dan wisata bahari yang kini mulai dikembangkan bersama masyarakat dan pemerintah.
                </p>
                <p>
                    Melalui berbagai upaya pembinaan dan pemberdayaan, Kampung Tihi-Tihi diarahkan menjadi desa wisata bahari yang berkelanjutan tanpa meninggalkan identitas budaya pesisir yang menjadi bagian dari sejarahnya.
                </p>
            </div>
        </div>
    </section>

    <script>
        function toggleMenu() {
            const nav = document.getElementById('navMenu');
            const toggle = document.querySelector('.menu-toggle');
            nav.classList.toggle('active');
            
            // Animasi icon hamburger
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

        // Efek Header saat Scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.style.background = 'rgba(0, 0, 0, 0.9)';
                header.style.padding = '10px 5%';
            } else {
                header.style.background = 'rgba(0, 0, 0, 0.7)';
                header.style.padding = '15px 5%';
            }
        });
    </script>
</body>
</html>