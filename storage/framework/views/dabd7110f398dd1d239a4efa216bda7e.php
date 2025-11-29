<!DOCTYPE html>
<html lang="id">
<head>
    <title><?php echo e($berita->judul); ?></title>
    <style>
        /* STYLE GLOBAL & HEADER */
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #f9f9f9; color: #333; }
        .header { background: rgba(0,0,0,0.8); padding: 20px 40px; position: fixed; top: 0; width: 100%; z-index: 1000; display: flex; justify-content: space-between; align-items: center; }
        .logo h1 { font-size: 24px; color: white; margin:0; } .logo .wonderful { color: #00bcd4; font-weight: 700; }
        .nav-container { display: flex; justify-content: space-between; align-items: center; width: 100%; max-width: 1400px; margin: 0 auto; }
        .nav-menu { display: flex; gap: 25px; list-style: none; margin:0; padding:0; }
        .nav-menu a { color: white; text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.3s; }
        .nav-menu a:hover { color: #00bcd4; }

        .container { max-width: 1100px; margin: 100px auto 40px; padding: 0 20px; display: grid; grid-template-columns: 3fr 1fr; gap: 40px; }
        
        .main-content { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .news-img { width: 100%; height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 20px; }
        .news-title { font-size: 32px; margin-bottom: 10px; color: #333; }
        .news-body { font-size: 16px; line-height: 1.8; color: #444; }

        .sidebar-widget { background: white; padding: 25px; border-radius: 8px; margin-bottom: 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .widget-title { font-size: 18px; font-weight: bold; margin-bottom: 15px; border-left: 4px solid #00bcd4; padding-left: 10px; color: #333; }
        .recent-item { display: flex; gap: 10px; margin-bottom: 15px; }
        .recent-item img { width: 70px; height: 70px; object-fit: cover; border-radius: 5px; }
        .recent-item a { text-decoration: none; color: #333; font-size: 14px; line-height: 1.4; font-weight: 600; }
        .recent-item a:hover { color: #00bcd4; }
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
        <div class="main-content">
            <?php if($berita->gambar): ?>
                <img src="<?php echo e(asset('uploads/berita/'.$berita->gambar)); ?>" class="news-img">
            <?php endif; ?>
            <h1 class="news-title"><?php echo e($berita->judul); ?></h1>
            <p style="color:#888; font-size:14px; margin-bottom:20px;">Diposting pada <?php echo e(\Carbon\Carbon::parse($berita->created_at)->format('d F Y')); ?></p>
            <div class="news-body">
                <?php echo nl2br(e($berita->konten)); ?>

            </div>
        </div>

        <aside>
            <div class="sidebar-widget">
                <h3 class="widget-title">Berita Terbaru</h3>
                <?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="recent-item">
                    <img src="<?php echo e($post->gambar ? asset('uploads/berita/'.$post->gambar) : 'https://via.placeholder.com/100'); ?>">
                    <div>
                        <a href="<?php echo e(route('informasi.berita.show', $post->slug)); ?>"><?php echo e(Str::limit($post->judul, 40)); ?></a>
                        <br><small style="color:#999;"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('d M Y')); ?></small>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </aside>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/informasi/detail_berita.blade.php ENDPATH**/ ?>