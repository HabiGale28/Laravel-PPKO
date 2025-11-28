<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Wonderful Indonesia</title>
    <style>
        /* === 1. COPY STYLE GLOBAL (Sama dengan Beranda) === */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fff; color: #333; overflow-x: hidden; }

        /* Header Styling */
        .header {
            position: fixed;
            top: 0; width: 100%;
            background: rgba(0, 0, 0, 0.7);
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

        .admin-login-btn {
            padding: 8px 20px; background: linear-gradient(135deg, #009688 0%, #00bcd4 100%);
            color: white; border: none; border-radius: 20px; cursor: pointer;
            font-weight: 600; transition: all 0.3s; font-size: 13px; text-decoration: none;
        }
        .admin-login-btn:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0, 188, 212, 0.5); }

        /* === 2. STYLE KHUSUS HALAMAN GALERI === */

        /* Banner */
        .page-banner {
            height: 50vh;
            background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=1920');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 50px;
        }
        .page-banner::before { 
            content:''; position:absolute; inset:0; 
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
        }
        .banner-content { position: relative; z-index: 2; color: white; }
        .banner-content h1 { font-size: 48px; font-weight: 700; margin-bottom: 10px; }
        .banner-content p { font-size: 18px; opacity: 0.9; }

        /* Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px 80px; }

        /* Album Grid */
        .album-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        /* Album Card */
        .album-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            border: 1px solid #eee;
            position: relative;
        }
        .album-card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.15); }
        
        .album-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .album-content {
            padding: 20px;
            text-align: center;
        }
        .album-content h3 { font-size: 20px; color: #333; margin-bottom: 5px; }
        .album-content p { font-size: 14px; color: #777; margin-bottom: 15px; }

        .btn-lihat {
            display: inline-block;
            background: #00bcd4;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s;
        }
        .btn-lihat:hover { background: #008ba3; }

        /* Pagination Styling */
        .pagination-wrapper { margin-top: 40px; display: flex; justify-content: center; }
        
        @media (max-width: 992px) { .album-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 768px) { 
            .album-grid { grid-template-columns: 1fr; } 
            .banner-content h1 { font-size: 36px; }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="nav-container">
            <div class="logo">
                <h1><span class="wonderful">wonderful</span> indonesia</h1>
            </div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="<?php echo e(route('home')); ?>">🏠 Beranda</a></li>
                    <li><a href="<?php echo e(route('profil.desa')); ?>">👤 Profil</a></li>
                    <li><a href="<?php echo e(route('wisata.index')); ?>">🏝️ Wisata</a></li>
                    <li><a href="<?php echo e(route('kebudayaan.index')); ?>">🎭 Kebudayaan</a></li>
                    <li><a href="#">📰 Berita</a></li> 
                    <li><a href="#informasi">ℹ️ Informasi</a></li>
                    <li><a href="<?php echo e(route('galeri.index')); ?>" style="color: #00bcd4;">📸 Galeri</a></li>
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

    <div class="page-banner">
        <div class="banner-content">
            <h1>Galeri & Dokumentasi</h1>
            <p>Momen-momen indah yang terabadikan</p>
        </div>
    </div>

    <div class="container">
        <?php if($albums->count() > 0): ?>
            <div class="album-grid">
                <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="album-card">
                    <img src="<?php echo e(asset('uploads/albums/'.$album->cover_album)); ?>" alt="<?php echo e($album->nama_album); ?>">
                    <div class="album-content">
                        <h3><?php echo e($album->nama_album); ?></h3>
                        <p><?php echo e($album->fotos_count); ?> Foto</p>
                        <a href="<?php echo e(route('galeri.show', $album->slug)); ?>" class="btn-lihat">Lihat Album</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="pagination-wrapper">
                <?php echo e($albums->links()); ?>

            </div>
        <?php else: ?>
            <div style="text-align: center; padding: 50px; color: #666;">
                <h3>Belum ada album galeri.</h3>
            </div>
        <?php endif; ?>
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/galeri/index.blade.php ENDPATH**/ ?>