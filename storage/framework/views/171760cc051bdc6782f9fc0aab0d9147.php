<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi - Wonderful Indonesia</title>
    <style>
        /* --- GLOBAL STYLE (Sama dengan halaman lain) --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f9f9f9; color: #333; }
        
        /* Header */
        .header { background: rgba(0,0,0,0.8); padding: 20px 40px; position: fixed; top: 0; width: 100%; z-index: 1000; display: flex; justify-content: space-between; align-items: center; }
        .logo h1 { font-size: 24px; color: white; margin:0; } 
        .logo .wonderful { color: #00bcd4; font-weight: 700; }
        .nav-menu { display: flex; gap: 25px; list-style: none; margin:0; padding:0; }
        .nav-menu a { color: white; text-decoration: none; font-size: 14px; font-weight: 500; }
        .nav-menu a:hover { color: #00bcd4; }

        /* Banner */
        .page-banner {
            height: 45vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1920');
            background-size: cover; background-position: center;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center; color: white;
        }
        .banner-title h1 { font-size: 42px; margin-bottom: 10px; font-weight: 700; }

        /* Container */
        .container { max-width: 1140px; margin: 0 auto; padding: 60px 20px; }
        
        /* Section Title */
        .section-header { margin-bottom: 30px; border-left: 5px solid #00bcd4; padding-left: 15px; }
        .section-header h2 { font-size: 28px; margin: 0; color: #2c3e50; }

        /* --- 1. PENGUMUMAN STYLE (List Card) --- */
        .pengumuman-list { display: flex; flex-direction: column; gap: 20px; margin-bottom: 80px; }
        .pengumuman-card {
            background: white; border-radius: 8px; overflow: hidden; display: flex;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05); transition: transform 0.3s;
        }
        .pengumuman-card:hover { transform: translateY(-3px); box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .p-date {
            background: #00bcd4; color: white; min-width: 100px; display: flex; flex-direction: column;
            align-items: center; justify-content: center; text-align: center; padding: 15px;
        }
        .p-date .day { font-size: 28px; font-weight: bold; line-height: 1; }
        .p-date .month { font-size: 12px; text-transform: uppercase; margin-top: 5px; }
        .p-content { padding: 25px; flex: 1; display: flex; flex-direction: column; justify-content: center; }
        .p-tag { font-size: 11px; text-transform: uppercase; color: #00bcd4; font-weight: bold; letter-spacing: 1px; margin-bottom: 5px; }
        .p-title { font-size: 20px; font-weight: 700; margin-bottom: 10px; color: #333; }
        .p-desc { color: #666; font-size: 14px; margin-bottom: 15px; line-height: 1.6; }
        .btn-read { color: #00bcd4; text-decoration: none; font-weight: 600; font-size: 13px; display: inline-flex; align-items: center; gap: 5px; }

        /* --- 2. EVENT STYLE (Grid Dark Card) --- */
        .event-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; margin-bottom: 80px; }
        .event-card {
            background: #1e293b; color: white; border-radius: 12px; overflow: hidden; display: flex;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); height: 220px;
        }
        .event-img { width: 40%; background-size: cover; background-position: center; position: relative; }
        .event-status { 
            position: absolute; top: 10px; left: 10px; background: #ffc107; color: #000; 
            padding: 4px 10px; border-radius: 4px; font-size: 10px; font-weight: bold; text-transform: uppercase; 
        }
        .event-info { padding: 25px; width: 60%; display: flex; flex-direction: column; justify-content: center; }
        .event-date { color: #00bcd4; font-size: 13px; font-weight: 600; margin-bottom: 8px; }
        .event-title { font-size: 20px; font-weight: bold; margin-bottom: 10px; line-height: 1.4; }
        .event-loc { font-size: 13px; color: #94a3b8; display: flex; align-items: center; gap: 5px; }
        
        /* --- 3. BERITA STYLE (Grid Standard) --- */
        .berita-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
        .berita-card { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); transition: 0.3s; }
        .berita-card:hover { transform: translateY(-5px); }
        .berita-thumb { width: 100%; height: 200px; object-fit: cover; }
        .berita-body { padding: 20px; }
        .berita-meta { font-size: 12px; color: #888; margin-bottom: 10px; }
        .berita-title { font-size: 18px; font-weight: 700; margin-bottom: 10px; color: #333; line-height: 1.4; }
        .berita-title a { text-decoration: none; color: inherit; }
        
        @media(max-width: 768px) {
            .event-grid, .berita-grid { grid-template-columns: 1fr; }
            .pengumuman-card { flex-direction: column; }
            .p-date { flex-direction: row; gap: 10px; width: 100%; padding: 10px; }
            .event-card { flex-direction: column; height: auto; }
            .event-img { width: 100%; height: 150px; }
            .event-info { width: 100%; }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="logo"><h1><span class="wonderful">wonderful</span> indonesia</h1></div>
        <ul class="nav-menu">
            <li><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
            <li><a href="<?php echo e(route('profil.desa')); ?>">Profil</a></li>
            <li><a href="<?php echo e(route('wisata.index')); ?>">Wisata</a></li>
            <li><a href="<?php echo e(route('kebudayaan.index')); ?>">Kebudayaan</a></li>
            <!-- MENU AKTIF -->
            <li><a href="<?php echo e(route('informasi.index')); ?>" style="color: #00bcd4; border-bottom: 2px solid #00bcd4;">Informasi</a></li>
            <li><a href="<?php echo e(route('galeri.index')); ?>">Galeri</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>
    </header>

    <div class="page-banner">
        <h1>Pusat Informasi</h1>
        <p>Dapatkan kabar terbaru, pengumuman penting, dan agenda kegiatan menarik.</p>
    </div>

    <div class="container">
        
        <!-- 1. SECTION PENGUMUMAN -->
        <div class="section-header">
            <h2>Pengumuman Terbaru</h2>
            <p>Informasi resmi dan pemberitahuan penting</p>
        </div>
        <div class="pengumuman-list">
            <?php $__empty_1 = true; $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="pengumuman-card">
                <div class="p-date">
                    <span class="day"><?php echo e(\Carbon\Carbon::parse($item->tanggal_publish)->format('d')); ?></span>
                    <span class="month"><?php echo e(\Carbon\Carbon::parse($item->tanggal_publish)->format('M Y')); ?></span>
                </div>
                <div class="p-content">
                    <div class="p-tag">Pengumuman</div>
                    <div class="p-title"><?php echo e($item->judul); ?></div>
                    <div class="p-desc"><?php echo e(Str::limit(strip_tags($item->konten), 150)); ?></div>
                    <a href="<?php echo e(route('informasi.pengumuman.show', $item->slug)); ?>" class="btn-read">Selengkapnya &rarr;</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="color:#999; font-style:italic;">Belum ada pengumuman.</p>
            <?php endif; ?>
        </div>

        <!-- 2. SECTION EVENT -->
        <div class="section-header">
            <h2>Agenda Event</h2>
            <p>Jangan lewatkan kegiatan seru mendatang</p>
        </div>
        <div class="event-grid">
            <?php $__empty_1 = true; $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="event-card">
                <div class="event-img" style="background-image: url('<?php echo e($item->gambar ? asset('uploads/event/'.$item->gambar) : 'https://via.placeholder.com/400x300?text=Event'); ?>');">
                    <div class="event-status">Upcoming</div>
                </div>
                <div class="event-info">
                    <div class="event-date">📅 <?php echo e(\Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y')); ?></div>
                    <div class="event-title"><?php echo e($item->judul); ?></div>
                    <div class="event-loc">📍 <?php echo e($item->lokasi ?? 'Online'); ?></div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="color:#999; font-style:italic;">Belum ada event terjadwal.</p>
            <?php endif; ?>
        </div>

        <!-- 3. SECTION BERITA -->
        <div class="section-header">
            <h2>Berita & Artikel</h2>
            <p>Cerita dan kabar terbaru dari kami</p>
        </div>
        <div class="berita-grid">
            <?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="berita-card">
                <img src="<?php echo e($item->gambar ? asset('uploads/berita/'.$item->gambar) : 'https://via.placeholder.com/400x250?text=News'); ?>" class="berita-thumb">
                <div class="berita-body">
                    <div class="berita-meta"><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d F Y')); ?></div>
                    <div class="berita-title">
                        <a href="<?php echo e(route('informasi.berita.show', $item->slug)); ?>"><?php echo e($item->judul); ?></a>
                    </div>
                    <div class="berita-excerpt"><?php echo e(Str::limit(strip_tags($item->konten), 100)); ?></div>
                    <a href="<?php echo e(route('informasi.berita.show', $item->slug)); ?>" class="btn-read">Baca Selengkapnya</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="color:#999; font-style:italic;">Belum ada berita.</p>
            <?php endif; ?>
        </div>

    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/informasi/index.blade.php ENDPATH**/ ?>