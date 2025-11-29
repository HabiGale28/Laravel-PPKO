<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($destinasi->judul); ?> - Wonderful Indonesia</title>
    <style>
        /* === 1. GLOBAL STYLE (Sama dengan Home & Index) === */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fff; color: #333; overflow-x: hidden; }

        /* === 2. HEADER & NAV (Sama Persis dengan Home) === */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7); /* Background transparan gelap */
            backdrop-filter: blur(10px);
            padding: 20px 40px;
            z-index: 1000;
            transition: all 0.3s;
        }
        .nav-container { display: flex; justify-content: space-between; align-items: center; max-width: 1400px; margin: 0 auto; }
        .logo h1 { font-size: 24px; font-weight: 300; color: white; }
        .logo .wonderful { color: #00bcd4; font-weight: 700; }
        .nav-menu { display: flex; list-style: none; gap: 30px; align-items: center; }
        .nav-menu a { color: white; text-decoration: none; transition: color 0.3s; font-size: 14px; }
        .nav-menu a:hover { color: #00bcd4; }

        /* === 3. HERO SECTION (DETAIL) === */
        .detail-hero {
            height: 70vh; /* Tinggi gambar utama */
            background-image: url('<?php echo e($destinasi->gambar_utama ? asset('uploads/'.$destinasi->gambar_utama) : ''); ?>');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        /* Overlay gelap agar teks navigasi terbaca */
        .detail-hero::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0) 50%, rgba(0,0,0,0.8) 100%);
        }

        /* Judul di tengah gambar (Style Baru) */
        .hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 60px 20px;
            text-align: center;
            color: white;
            z-index: 2;
        }
        .hero-content h1 {
            font-size: 56px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 20px rgba(0,0,0,0.5);
        }
        .hero-content .location {
            font-size: 18px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 20px;
            border-radius: 30px;
            backdrop-filter: blur(5px);
        }

        /* === 4. KONTEN UTAMA === */
        .main-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 60px 20px;
            background: white;
            position: relative;
        }

        /* STATISTIK GRID DIHAPUS DARI SINI */

        /* Artikel */
        .article-content {
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            margin-bottom: 50px;
        }
        .article-content p { margin-bottom: 20px; }

        /* Tombol Kembali */
        .back-link {
            display: inline-flex; align-items: center; gap: 10px;
            text-decoration: none; color: #333; font-weight: 600;
            transition: color 0.3s;
        }
        .back-link:hover { color: #00bcd4; }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 { font-size: 36px; }
        }
    </style>
</head>
<body>

    <!-- Header (Sama Persis dengan Halaman Lain) -->
    <header class="header">
        <div class="nav-container">
            <div class="logo">
                <h1><span class="wonderful">wonderful</span> indonesia</h1>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="<?php echo e(route('home')); ?>">🏠 Beranda</a></li>
                    <li><a href="<?php echo e(route('profil.desa')); ?>">👤 Profil</a></li>
                    <li><a href="<?php echo e(route('wisata.index')); ?>" style="color: #00bcd4;">🏝️ Wisata</a></li>
                    <li><a href="#kebudayaan">🎭 Kebudayaan</a></li>
                    <li><a href="#">📰 Berita</a></li> 
                    <li><a href="#informasi">ℹ️ Informasi</a></li>
                    <li><a href="#galeri">📸 Galeri</a></li>
                    <li><a href="#kontak">📞 Kontak</a></li>
                    
                    <!-- TOMBOL ADMIN DIHAPUS -->
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Image (Gambar Besar) -->
    <div class="detail-hero">
        <div class="hero-content">
            <h1><?php echo e($destinasi->judul); ?></h1>
            <div class="location">
                📍 <?php echo e($destinasi->lokasi); ?>, <?php echo e($destinasi->provinsi); ?>

            </div>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="main-container">
        
        <!-- Isi Artikel -->
        <div class="article-content">
            <!-- Menampilkan tipe pariwisata sebagai label kecil -->
            <span style="background: #ffc107; padding: 5px 15px; border-radius: 15px; font-size: 14px; font-weight: bold; margin-bottom: 20px; display: inline-block;">
                <?php echo e($destinasi->tipe_pariwisata ?? 'Wisata Umum'); ?>

            </span>

            <!-- Konten -->
            <?php echo nl2br(e($destinasi->konten ?? $destinasi->deskripsi)); ?>

        </div>

        <!-- Tombol Kembali -->
        <a href="<?php echo e(route('wisata.index')); ?>" class="back-link">
            ← Kembali ke Daftar Wisata
        </a>

    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/wisata/show.blade.php ENDPATH**/ ?>