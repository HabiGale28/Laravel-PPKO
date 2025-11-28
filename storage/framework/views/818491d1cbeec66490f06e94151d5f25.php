<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampung Wisata Tihi - Tihi</title>
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

        /* Header */
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

        .admin-login-btn {
            padding: 8px 20px;
            background: linear-gradient(135deg, #009688 0%, #00bcd4 100%);
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 13px;
            text-decoration: none;
        }

        .admin-login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 188, 212, 0.5);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
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
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            padding: 0 20px;
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
        }

        .hero-title {
            font-size: 64px;
            font-weight: 700;
            margin-bottom: 40px;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
        }

        .stats-container {
            display: flex;
            gap: 50px;
            justify-content: center;
        }

        .stat-item { text-align: center; }
        .stat-number { font-size: 48px; font-weight: 700; color: #00bcd4; }
        .stat-label { font-size: 14px; color: rgba(255, 255, 255, 0.8); margin-top: 5px; }
        
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
        .video-popup {
            display: none; position: fixed; top: 0; left: 0;
            width: 100%; height: 100%; background: rgba(0, 0, 0, 0.95);
            z-index: 2000; justify-content: center; align-items: center;
        }
        .video-popup.active { display: flex; }
        .video-container { position: relative; width: 90%; max-width: 1200px; }
        .video-container video { width: 100%; border-radius: 10px; }
        .close-button {
            position: absolute; top: -50px; right: 0;
            width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1);
            border: 1px solid white; border-radius: 50%;
            color: white; font-size: 24px; cursor: pointer; transition: all 0.3s;
        }
        .close-button:hover { background: rgba(255, 255, 255, 0.2); transform: rotate(90deg); }
        
        .social-icons {
            position: absolute; 
            right: 40px;
            bottom: 40px; 
            transform: none; 
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


        /* ============================ */
        /* === STYLING KONTEN BARU === */
        /* ============================ */
        .content-section {
            background: #fff;
            padding: 80px 40px;
            color: #333;
        }
        .content-section.dark-bg {
             background: #0d1a2c; /* Warna biru tua */
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
        .content-section.dark-bg h2 {
            color: white;
        }
        .section-title-center {
            text-align: center;
        }

        /* --- Bagian "Tentang" --- */
        .about-section .container {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        .about-content {
            flex: 1;
        }
        .about-content h2 {
            font-size: 42px;
            line-height: 1.3;
        }
        .about-content p {
            font-size: 16px;
            line-height: 1.7;
            margin: 20px 0 30px;
            color: #555;
        }
        .btn-selengkapnya {
            background: #ffc107; /* Tombol kuning */
            color: #333;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-selengkapnya:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.4);
        }
        .about-video {
            flex: 1;
            position: relative;
            cursor: pointer;
        }
        .about-video img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .play-button-small {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 2px solid white;
            transition: all 0.3s;
        }
        .play-button-small::after {
            content: '▶';
            font-size: 24px;
            color: white;
            position: absolute;
            top: 50%;
            left: 55%;
            transform: translate(-50%, -50%);
        }
        .about-video:hover .play-button-small {
            transform: translate(-50%, -50%) scale(1.1);
            background: rgba(255, 255, 255, 0.4);
        }

        /* --- Bagian "Experience" (Travel, dll) --- */
        .experience-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            text-align: center;
        }
        .experience-item {
            padding: 20px;
        }
        .experience-item .icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: #00bcd4;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
        }
        .experience-item h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: white;
        }
        .experience-item p {
            font-size: 15px;
            line-height: 1.6;
            color: #ddd;
        }

        /* --- Bagian Grid & Card --- */
        .grid-container {
            display: grid;
            gap: 30px;
        }
        .destinasi-grid {
            grid-template-columns: repeat(3, 1fr); /* 3 kolom */
        }
        .berita-grid {
            grid-template-columns: repeat(2, 1fr); /* 2x2 grid */
        }

        /* Card Destinasi */
        .destinasi-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }
        .destinasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }
        .destinasi-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .destinasi-card .card-content {
            padding: 25px;
        }
        .destinasi-card h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #1a202c;
        }
        .destinasi-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .destinasi-card span {
            font-size: 14px;
            font-weight: 600;
            color: #009688;
        }

        /* Card Berita */
        .berita-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }
        .berita-card:hover {
             transform: translateY(-5px);
        }
        .berita-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
        }
        .berita-card .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 25px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
        }
        .berita-card h3 {
            font-size: 24px;
            font-weight: 600;
        }
        .berita-tag {
            background: #ffc107;
            color: #333;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }

        /* --- Responsive --- */
        @media (max-width: 992px) {
            .about-section .container {
                flex-direction: column;
            }
            .experience-grid, .destinasi-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 768px) {
            .experience-grid, .destinasi-grid, .berita-grid {
                grid-template-columns: 1fr;
            }
            .hero-title {
                font-size: 42px;
            }
            .play-button {
                right: 50%;
                transform: translate(50%, -50%);
            }
        }

    </style>
</head>
<body>
    <header class="header">
        <div class="nav-container">
            <div class="logo">
                <h1><span class="wonderful">Kampung Wisata</span> Tihi - Tihi</h1>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="<?php echo e(route('home')); ?>">🏠 Beranda</a></li>
                    <li><a href="<?php echo e(route('profil.desa')); ?>">👤 Profil</a></li>
                    <li><a href="<?php echo e(route('wisata.index')); ?>">🏝️ Wisata</a></li>
                    <li><a href="<?php echo e(route('kebudayaan.index')); ?>">🎭 Kebudayaan</a></li>
                    
                    <!-- MENU BARU: INFORMASI (Menggantikan Berita) -->
                    <li><a href="<?php echo e(route('informasi.index')); ?>">ℹ️ Informasi</a></li>
                    
                    <li><a href="<?php echo e(route('galeri.index')); ?>">📸 Galeri</a></li>
                    <li><a href="#kontak">📞 Kontak</a></li>

                    <?php if(auth()->guard()->check()): ?>
                        <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="admin-login-btn">Panel Admin</a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('login')); ?>" class="admin-login-btn">🔐 Admin</a></li>
                    <?php endif; ?>
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

        <button class="play-button" onclick="openVideoPopup()"></button>
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
                <h2>Tentang Kabupaten<br>Bolaang Mongondow</h2>
                <p>Sebuah kabupaten di Provinsi Sulawesi Utara, Indonesia dengan pusat pemerintahan berlokasi di Tutuyan. Kabupaten ini memiliki sejarah panjang dan kekayaan budaya yang unik.</p>
                <a href="#" class="btn-selengkapnya">Selengkapnya →</a>
            </div>
            <div class="about-video" onclick="openVideoPopup()">
                <img src="https://images.unsplash.com/photo-1507525428034-b723a9ce6890?w=1200" alt="Video thumbnail pantai">
                <div class="play-button-small"></div>
            </div>
        </div>
    </section>

    <section class="content-section dark-bg">
        <div class="container">
            <div class="experience-grid">
                <div class="experience-item">
                    <div class="icon">✈️</div>
                    <h3>Travel</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="experience-item">
                    <div class="icon">🗺️</div>
                    <h3>Experience</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="experience-item">
                    <div class="icon">🏖️</div>
                    <h3>Relax</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content-section">
        <div class="container">
            <h2 class="section-title-center">Destinasi terbaik sudah menunggu!</h2>
            <div class="grid-container destinasi-grid">
                
                <?php $__empty_1 = true; $__currentLoopData = $latest_destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destinasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="destinasi-card">
                    <img src="<?php echo e($destinasi->gambar_utama ? asset('uploads/' . $destinasi->gambar_utama) : 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=800'); ?>" alt="<?php echo e($destinasi->judul); ?>">
                    <div class="card-content">
                        <h3><?php echo e($destinasi->judul); ?></h3>
                        <p><?php echo e(Str::limit($destinasi->deskripsi, 100)); ?></p>
                        <span>📍 <?php echo e($destinasi->lokasi); ?></span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>Belum ada destinasi untuk ditampilkan.</p>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <section class="content-section dark-bg">
        <div class="container">
            <h2 class="section-title-center">Berita dari Bolaang Mongondow</h2>
            <div class="grid-container berita-grid">

                <?php $__empty_1 = true; $__currentLoopData = $latest_berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="berita-card">
                    <img src="<?php echo e($news->gambar ? asset('uploads/' . $news->gambar) : 'https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=800'); ?>" alt="<?php echo e($news->judul); ?>">
                    <div class="card-overlay">
                        <span class="berita-tag">Berita</span>
                        <h3><?php echo e($news->judul); ?></h3>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="text-align: center; grid-column: 1 / -1;">Belum ada berita untuk ditampilkan.</p>
                <?php endif; ?>

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
        // Ambil data slider dari Controller
        const destinations = <?php echo json_encode($sliders ?? [], 15, 512) ?>;

        const totalSlides = destinations.length > 0 ? destinations.length : 1;
        let currentSlide = 1;
        let isTransitioning = false;

        function updateSlideContent(slideIndex) {
            if (isTransitioning) return;
            
            // Jika tidak ada data slider
            if (destinations.length === 0) {
                document.querySelector('.page-counter').innerHTML = `<span class="current">00</span> / 00`;
                document.querySelector('.hero-title').textContent = "Selamat Datang";
                document.querySelector('.location-tag').textContent = "Website Wisata";
                // Gambar default
                document.querySelector('.hero').style.backgroundImage = `url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920')`;
                return;
            }

            isTransitioning = true;
            
            // Ambil data slider saat ini (index mulai dari 0)
            const destination = destinations[slideIndex - 1];
            const hero = document.querySelector('.hero');
            const content = document.querySelector('.hero-content');
            
            content.classList.add('fade-out');
            
            setTimeout(() => {
                // Update Teks
                document.querySelector('.location-tag').textContent = destination.lokasi || '';
                document.querySelector('.hero-title').textContent = destination.judul;
                
                // Update Statistik (Statik dulu, karena tabel slider tidak punya kolom ini)
                const statNumbers = document.querySelectorAll('.stat-number');
                if(statNumbers.length > 0) {
                    statNumbers[0].textContent = "0"; // Bisa diganti nanti
                    statNumbers[1].textContent = "0";
                    statNumbers[2].textContent = "0";
                }
                
                // Update Counter
                document.querySelector('.page-counter .current').textContent = slideIndex.toString().padStart(2, '0');
                
                // Update Gambar Background
                // PERBAIKAN DI SINI:
                const imageUrl = `<?php echo e(asset('uploads/sliders')); ?>/${destination.gambar}`;
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
            if (window.scrollY > 100) {
                header.style.background = 'rgba(0, 0, 0, 0.9)';
            } else {
                header.style.background = 'rgba(0, 0, 0, 0.7)';
            }
        });

        window.addEventListener('load', function() {
            document.querySelector('.page-counter').innerHTML = 
                `<span class="current">01</span> / ${totalSlides.toString().padStart(2, '0')}`;
            updateSlideContent(1);
        });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/welcome.blade.php ENDPATH**/ ?>