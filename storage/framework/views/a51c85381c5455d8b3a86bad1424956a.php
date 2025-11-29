<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata - Wonderful Indonesia</title>
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
        }

        /* =========================================
           HEADER
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

        .logo .wonderful { color: #00bcd4; font-weight: 700; }

        .nav-menu { display: flex; list-style: none; gap: 25px; align-items: center; }
        .nav-menu a { color: white; text-decoration: none; transition: color 0.3s; font-size: 14px; font-weight: 500; }
        .nav-menu a:hover { color: #00bcd4; }

        .menu-toggle { display: none; flex-direction: column; cursor: pointer; gap: 5px; z-index: 1001; }
        .menu-toggle span { width: 30px; height: 3px; background-color: white; border-radius: 5px; transition: all 0.3s; }

        /* =========================================
           STYLE KHUSUS WISATA (CLEAN)
           ========================================= */

        .page-banner {
            height: 50vh;
            min-height: 300px;
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
            margin-top: 0;
        }

        .page-banner::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.8));
        }

        .banner-content { position: relative; z-index: 2; padding: 0 20px; }
        .banner-content h1 { font-size: clamp(36px, 5vw, 56px); font-weight: 700; margin-bottom: 10px; }
        .banner-content p { font-size: clamp(16px, 3vw, 18px); opacity: 0.9; }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 5% 80px;
        }

        .destinasi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        /* === CLEAN CARD STYLE === */
        .destinasi-card {
            position: relative;
            height: 350px; /* Tinggi Fix */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }

        .destinasi-card:hover {
            transform: translateY(-5px);
        }

        .destinasi-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .destinasi-card:hover img {
            transform: scale(1.05);
        }

        /* Judul simpel di bawah gambar (overlay) */
        .simple-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); /* Gradasi hitam halus */
            z-index: 2;
        }

        .simple-overlay h3 {
            color: white;
            font-size: 20px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
            margin: 0; /* Hapus margin agar pas */
        }

        /* Responsive */
        @media (max-width: 768px) {
            .menu-toggle { display: flex; }
            .nav-menu {
                position: fixed; top: 0; right: -100%;
                height: 100vh; width: 75%;
                background: rgba(13, 26, 44, 0.98);
                backdrop-filter: blur(10px);
                flex-direction: column; justify-content: center;
                transition: 0.4s ease;
            }
            .nav-menu.active { right: 0; }
            .nav-menu li { margin: 15px 0; }
            .nav-menu a { font-size: 18px; }
            
            .destinasi-grid { grid-template-columns: 1fr; }
            .page-banner { height: 40vh; }
            .destinasi-card { height: 250px; } /* Lebih pendek di HP */
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
                    <li><a href="<?php echo e(route('home')); ?>">🏠 Beranda</a></li>
                    <li><a href="<?php echo e(route('profil.desa')); ?>">👤 Profil</a></li>
                    <li><a href="<?php echo e(route('wisata.index')); ?>" style="color: #00bcd4;">🏝️ Wisata</a></li>
                    <li><a href="<?php echo e(route('kebudayaan.index')); ?>">🎭 Kebudayaan</a></li>
                    <li><a href="<?php echo e(route('informasi.index')); ?>">ℹ️ Informasi</a></li>
                    <li><a href="<?php echo e(route('galeri.index')); ?>">📸 Galeri</a></li>
                    <li><a href="<?php echo e(route('kontak')); ?>">📞 Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-banner">
        <div class="banner-content">
            <h1>Destinasi Wisata</h1>
            <p>Jelajahi keindahan Kampung Terapung</p>
        </div>
    </div>

    <div class="container">
        
        <?php if($destinations->count() > 0): ?>
            <div class="destinasi-grid">
                <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destinasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="destinasi-card">
                    <!-- Gambar -->
                    <img src="<?php echo e($destinasi->gambar_utama ? asset('uploads/'.$destinasi->gambar_utama) : 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=800'); ?>" alt="<?php echo e($destinasi->judul); ?>">
                    
                    <div class="card-content">
                        <!-- Lokasi -->
                        <span class="meta-location">📍 <?php echo e($destinasi->lokasi); ?></span>
                        
                        <!-- Judul -->
                        <h3><?php echo e($destinasi->judul); ?></h3>
                        
                        <!-- Deskripsi Singkat -->
                        <p><?php echo e($destinasi->deskripsi_singkat ?? Str::limit($destinasi->deskripsi, 100)); ?></p>
                        
                        <!-- Tombol -->
                        <a href="<?php echo e(route('wisata.show', $destinasi->slug)); ?>" class="btn-selengkapnya">
                            Selengkapnya &rarr;
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div style="text-align: center; padding: 50px; color: #666;">
                <h3>Belum ada data destinasi wisata.</h3>
                <p>Silakan tambahkan data melalui panel admin.</p>
            </div>
        <?php endif; ?>

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
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/wisata/index.blade.php ENDPATH**/ ?>