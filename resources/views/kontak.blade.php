<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Wonderful Indonesia</title>
    <style>
        /* =========================================
           RESET & GLOBAL STYLES
           ========================================= */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f9f9f9; color: #333; overflow-x: hidden; }

        /* =========================================
           HEADER (RESPONSIVE)
           ========================================= */
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

        /* =========================================
           STYLE KHUSUS KONTAK
           ========================================= */
        
        /* Banner */
        .page-banner {
            height: 50vh;
            min-height: 300px;
            background-image: url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1920');
            background-size: cover; background-position: center;
            position: relative; display: flex; align-items: center; justify-content: center;
            text-align: center; margin-bottom: 50px; margin-top: 0;
        }
        .page-banner::before { 
            content:''; position:absolute; inset:0; 
            background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.8));
        }
        .banner-content { position: relative; z-index: 2; color: white; padding: 0 20px; }
        .banner-content h1 { font-size: clamp(36px, 5vw, 48px); font-weight: 700; margin-bottom: 10px; font-family: serif; }
        .banner-content p { font-size: clamp(16px, 3vw, 18px); opacity: 0.9; letter-spacing: 1px; }

        /* Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 5% 80px; }

        /* Grid Layout */
        .contact-grid {
            display: grid;
            grid-template-columns: 3fr 2fr; /* Kolom kiri lebih lebar */
            gap: 50px;
        }

        /* Form Section */
        .contact-form-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border: 1px solid #eee;
        }
        .form-title { font-size: 24px; font-weight: 700; margin-bottom: 25px; color: #00bcd4; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; }
        
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: #555; }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background: #f9f9f9;
            font-family: inherit;
            transition: all 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none; border-color: #00bcd4; background: white; box-shadow: 0 0 0 3px rgba(0, 188, 212, 0.1);
        }
        
        .btn-submit {
            background: #00bcd4;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            display: inline-block;
            font-size: 14px;
        }
        .btn-submit:hover { background: #008ba3; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0, 188, 212, 0.3); }

        /* Info Section */
        .contact-info { padding-top: 10px; }
        .info-item { display: flex; gap: 20px; margin-bottom: 30px; align-items: flex-start; }
        .info-icon {
            width: 50px; height: 50px;
            background: #e0f7fa;
            color: #00bcd4;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }
        .info-text h4 { margin: 0 0 5px; font-size: 18px; color: #333; }
        .info-text p { margin: 0; color: #666; line-height: 1.6; font-size: 15px; }

        /* Map */
        .map-container {
            margin-top: 30px;
            border-radius: 15px;
            overflow: hidden;
            height: 300px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        iframe { width: 100%; height: 100%; border: 0; }

        /* Responsive Media Query */
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

            /* Content */
            .contact-grid { grid-template-columns: 1fr; gap: 40px; }
            .contact-form-box { padding: 30px 20px; }
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
                    <li><a href="{{ route('galeri.index') }}">📸 Galeri</a></li>
                    <li><a href="{{ route('kontak') }}" style="color: #00bcd4;">📞 Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-banner">
        <div class="banner-content">
            <h1>Hubungi Kami</h1>
            <p>Kami siap membantu perjalanan wisata Anda di Tihi-Tihi</p>
        </div>
    </div>

    <div class="container">
        <div class="contact-grid">
            
            <!-- Kolom Kiri: Form -->
            <div class="contact-form-box">
                <h3 class="form-title">Kirim Pesan</h3>
                <form action="#" method="POST"> <!-- Action bisa diisi route kirim pesan nanti -->
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama Anda">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" placeholder="Contoh: email@anda.com">
                    </div>
                    <div class="form-group">
                        <label>Subjek</label>
                        <input type="text" placeholder="Tujuan pesan">
                    </div>
                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>
                    <button type="button" class="btn-submit" onclick="alert('Fitur ini belum aktif dalam demo.')">Kirim Pesan</button>
                </form>
            </div>

            <!-- Kolom Kanan: Info & Peta -->
            <div class="contact-info">
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div class="info-text">
                        <h4>Alamat Kantor</h4>
                        <p>Jl. Tihi - Tihi Rt.17, Bontang Lestari<br>Kalimantan Timur, Indonesia</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div class="info-text">
                        <h4>Telepon & WhatsApp</h4>
                        <p>+62 821-5426-2695 "Ketua RT 17"<br>+62 852-4860-8153 "Ketua Pokdarwis"</p>
                    </div>
                </div>`

                <!-- Google Maps Embed -->
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8157836738537!2d117.52868500000001!3d0.06460899999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x320a0b4ef3d446b3%3A0x2021e0adb9d11842!2sKampung%20Tihi-tihi!5e0!3m2!1sid!2sid!4v1764343126217!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

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