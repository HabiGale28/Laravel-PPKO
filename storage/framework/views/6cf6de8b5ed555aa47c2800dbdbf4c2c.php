<!DOCTYPE html>
<html lang="id">
<head>
    <title><?php echo e($pengumuman->judul); ?></title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #f4f7f6; color: #333; }
        
        /* HEADER & NAV */
        .header { background: rgba(0,0,0,0.8); padding: 20px 40px; position: fixed; top: 0; width: 100%; z-index: 1000; display: flex; justify-content: space-between; align-items: center; }
        .logo h1 { font-size: 24px; color: white; margin:0; } .logo .wonderful { color: #00bcd4; font-weight: 700; }
        .nav-container { display: flex; justify-content: space-between; align-items: center; width: 100%; max-width: 1400px; margin: 0 auto; }
        .nav-menu { display: flex; gap: 25px; list-style: none; margin:0; padding:0; }
        .nav-menu a { color: white; text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.3s; }
        .nav-menu a:hover { color: #00bcd4; }

        .container { max-width: 800px; margin: 100px auto 50px; background: white; padding: 50px; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        .p-title { font-size: 36px; margin-bottom: 10px; color: #2c3e50; font-family: serif; }
        .p-date { background: #e0f2f1; color: #00695c; padding: 6px 15px; border-radius: 20px; display: inline-block; font-size: 14px; margin-bottom: 30px; font-weight: bold; }
        .p-content { font-size: 18px; line-height: 1.8; color: #444; }
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
        <h1 class="p-title"><?php echo e($pengumuman->judul); ?></h1>
        <div class="p-date">📅 <?php echo e(\Carbon\Carbon::parse($pengumuman->tanggal_publish)->format('d F Y')); ?></div>
        
        <?php if($pengumuman->gambar): ?>
            <img src="<?php echo e(asset('uploads/pengumuman/'.$pengumuman->gambar)); ?>" style="width: 100%; border-radius: 8px; margin-bottom: 30px;">
        <?php endif; ?>

        <div class="p-content">
            <?php echo nl2br(e($pengumuman->konten)); ?>

        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/informasi/detail_pengumuman.blade.php ENDPATH**/ ?>