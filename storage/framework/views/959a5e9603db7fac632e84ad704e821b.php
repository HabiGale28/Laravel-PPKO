<!DOCTYPE html>
<html lang="id">
<head>
    <title><?php echo e($event->judul); ?> - Event</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #0d1a2c; color: white; }
        
        /* HEADER & NAV */
        .header { background: rgba(0,0,0,0.8); padding: 20px 40px; position: fixed; top: 0; width: 100%; z-index: 1000; display: flex; justify-content: space-between; align-items: center; }
        .logo h1 { font-size: 24px; color: white; margin:0; } .logo .wonderful { color: #00bcd4; font-weight: 700; }
        .nav-container { display: flex; justify-content: space-between; align-items: center; width: 100%; max-width: 1400px; margin: 0 auto; }
        .nav-menu { display: flex; gap: 25px; list-style: none; margin:0; padding:0; }
        .nav-menu a { color: white; text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.3s; }
        .nav-menu a:hover { color: #00bcd4; }

        .container { max-width: 900px; margin: 100px auto 50px; padding: 20px; }
        .event-card { background: #1e293b; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        .event-img { width: 100%; height: 400px; object-fit: cover; }
        .event-body { padding: 40px; }
        .event-meta { display: flex; gap: 20px; margin-bottom: 20px; border-bottom: 1px solid #334155; padding-bottom: 20px; }
        .meta-item { display: flex; align-items: center; gap: 10px; font-size: 14px; color: #cbd5e1; }
        .icon { color: #00bcd4; font-size: 18px; }
        .event-title { font-size: 36px; font-weight: bold; margin-bottom: 20px; color: white; }
        .event-desc { font-size: 18px; line-height: 1.8; color: #cbd5e1; }
    </style>
</head>
<body>

    <header class="header">
        <div class="nav-container">
            <div class="logo"><h1><span class="wonderful">wonderful</span> indonesia</h1></div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="<?php echo e(route('home')); ?>">🏠 Beranda</a></li>
                    <li><a href="<?php echo e(route('profil.desa')); ?>">👤 Profil</a></li>
                    <li><a href="<?php echo e(route('wisata.index')); ?>">🏝️ Wisata</a></li>
                    <li><a href="<?php echo e(route('kebudayaan.index')); ?>">🎭 Kebudayaan</a></li>
                    <li><a href="<?php echo e(route('informasi.index')); ?>" style="color: #00bcd4;">ℹ️ Informasi</a></li>
                    <li><a href="<?php echo e(route('galeri.index')); ?>">📸 Galeri</a></li>
                    <li><a href="#kontak">📞 Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="event-card">
            <?php if($event->gambar): ?>
                <img src="<?php echo e(asset('uploads/event/'.$event->gambar)); ?>" class="event-img">
            <?php endif; ?>
            <div class="event-body">
                <div class="event-meta">
                    <div class="meta-item">
                        <span class="icon">📅</span> 
                        <?php echo e(\Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y')); ?>

                    </div>
                    <div class="meta-item">
                        <span class="icon">📍</span> 
                        <?php echo e($event->lokasi ?? 'Online'); ?>

                    </div>
                </div>
                <h1 class="event-title"><?php echo e($event->judul); ?></h1>
                <div class="event-desc">
                    <?php echo nl2br(e($event->konten ?? $event->deskripsi_singkat)); ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/informasi/detail_event.blade.php ENDPATH**/ ?>