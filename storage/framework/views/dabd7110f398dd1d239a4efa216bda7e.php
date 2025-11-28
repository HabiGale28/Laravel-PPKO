<!DOCTYPE html>
<html lang="id">
<head>
    <title><?php echo e($berita->judul); ?></title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #f9f9f9; color: #333; }
        .header { background: #000; padding: 15px 40px; color: white; }
        .header a { color: white; text-decoration: none; font-weight: bold; }
        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; display: grid; grid-template-columns: 3fr 1fr; gap: 40px; }
        
        .main-content { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .news-img { width: 100%; height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 20px; }
        .news-title { font-size: 32px; margin-bottom: 10px; color: #333; }
        .news-meta { color: #888; font-size: 14px; margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
        .news-body { font-size: 16px; line-height: 1.8; color: #444; }

        .sidebar-widget { background: white; padding: 25px; border-radius: 8px; margin-bottom: 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .widget-title { font-size: 18px; font-weight: bold; margin-bottom: 15px; border-left: 4px solid #00bcd4; padding-left: 10px; color: #333; }
        .cat-list { list-style: none; padding: 0; }
        .cat-list li { border-bottom: 1px solid #eee; padding: 10px 0; }
        .cat-list a { text-decoration: none; color: #555; transition: 0.3s; }
        .cat-list a:hover { color: #00bcd4; padding-left: 5px; }
        
        .recent-item { display: flex; gap: 10px; margin-bottom: 15px; }
        .recent-item img { width: 70px; height: 70px; object-fit: cover; border-radius: 5px; }
        .recent-item h4 { font-size: 14px; margin: 0; line-height: 1.4; }
        .recent-item a { text-decoration: none; color: #333; }
        .recent-item a:hover { color: #00bcd4; }

        @media(max-width: 768px) { .container { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="header">
        <a href="<?php echo e(route('informasi.index')); ?>">&larr; Kembali ke Informasi</a>
    </div>

    <div class="container">
        <div class="main-content">
            <?php if($berita->gambar): ?>
                <img src="<?php echo e(asset('uploads/berita/'.$berita->gambar)); ?>" class="news-img">
            <?php endif; ?>
            <h1 class="news-title"><?php echo e($berita->judul); ?></h1>
            <div class="news-meta">
                Diposting pada <?php echo e(\Carbon\Carbon::parse($berita->created_at)->format('d F Y')); ?>

                <?php if($berita->kategori): ?> | Kategori: <?php echo e($berita->kategori->nama); ?> <?php endif; ?>
            </div>
            <div class="news-body">
                <?php echo nl2br(e($berita->konten)); ?>

            </div>
        </div>

        <aside>
            <div class="sidebar-widget">
                <h3 class="widget-title">Kategori</h3>
                <ul class="cat-list">
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="#"><?php echo e($kat->nama); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($kategori->isEmpty()): ?> <li>Uncategorized</li> <?php endif; ?>
                </ul>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title">Berita Terbaru</h3>
                <?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="recent-item">
                    <img src="<?php echo e($post->gambar ? asset('uploads/berita/'.$post->gambar) : 'https://via.placeholder.com/100'); ?>">
                    <div>
                        <h4><a href="<?php echo e(route('informasi.berita.show', $post->slug)); ?>"><?php echo e(Str::limit($post->judul, 40)); ?></a></h4>
                        <small style="color: #999;"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('d M Y')); ?></small>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </aside>
    </div>
</body>
</html> <?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/informasi/detail_berita.blade.php ENDPATH**/ ?>