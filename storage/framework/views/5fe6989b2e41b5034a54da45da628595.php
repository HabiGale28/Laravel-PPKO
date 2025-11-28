<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Admin Dashboard'); ?> - Wonderful Indonesia</title>
    
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
        }

        .admin-layout {
            display: flex;
        }

        /* --- Sidebar Kiri --- */
        .admin-sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #c2c7d0;
            overflow-y: auto;
            padding-top: 20px;
            z-index: 1000;
        }
        
        .sidebar-header {
            padding: 0 20px 20px 20px;
            text-align: center;
            border-bottom: 1px solid #4f5962;
        }
        .sidebar-header a {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
        }
        .sidebar-header a span {
            color: #00bcd4;
        }
        
        .admin-user {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #4f5962;
        }
        .admin-user .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #00bcd4;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 15px;
        }
        .admin-user .username {
            color: white;
            font-weight: 500;
        }

        /* Menu Navigasi */
        .admin-menu {
            list-style: none;
            padding: 15px 0;
        }
        .admin-menu .menu-header {
            padding: 10px 20px;
            font-size: 12px;
            font-weight: 600;
            color: #888;
            text-transform: uppercase;
        }
        .admin-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #c2c7d0;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer; /* Pastikan kursor berubah jadi tangan */
        }
        .admin-menu li a:hover {
            background-color: #495057;
            color: white;
        }
        .admin-menu li a .icon {
            margin-right: 15px;
            font-size: 16px;
            width: 20px;
            display: inline-block;
            text-align: center;
        }

        /* Submenu Styling */
        .submenu {
            display: none; /* Default sembunyi */
            list-style: none;
            background-color: #2c3136;
            padding: 0;
        }
        .submenu li a {
            padding-left: 55px; /* Indentasi sub-menu */
            font-size: 14px;
            border-bottom: 1px solid #3a4047;
        }
        .submenu li a:hover {
            background-color: #3d444b;
        }
        
        /* --- Konten Utama --- */
        .admin-main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
        }

        .admin-main-header {
            background: #fff;
            padding: 15px 30px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .logout-btn {
            background: #f44336;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        .admin-content-area {
            padding: 30px;
        }
        
        .admin-content-box {
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        /* Tambahan Global Styles */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; color: #333; }
        th { background: #009688; color: white; text-transform: uppercase; font-size: 12px; }
        tr:nth-child(even) { background: #f9f9f9; }
        
        .btn, .btn-add, .btn-edit, .btn-delete { 
            padding: 8px 15px; border-radius: 5px; text-decoration: none; font-size: 14px; 
            display: inline-block; border: none; cursor: pointer; font-weight: 500; margin-right: 5px;
        }
        .btn-add { background: #009688; color: white; }
        .btn-edit { background: #2196F3; color: white; }
        .btn-delete { background: #f44336; color: white; }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #333; }
        .form-group input[type="text"], .form-group input[type="number"], .form-group textarea, .form-group select {
            width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 15px;
        }
        .form-group input[type="file"] { padding: 5px; }
        
        .flash-message { padding: 15px 20px; border-radius: 5px; margin-bottom: 20px; font-weight: 500; }
        .flash-message.success { background: #e6fffa; border: 1px solid #b2f5ea; color: #234e52; }
        .flash-message.error { background: #fed7d7; border: 1px solid #feb2b2; color: #742a2a; }
    </style>
</head>
<body>

    <div class="admin-layout">
        <!-- ==== SIDEBAR KIRI ==== -->
        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <a href="/">WEB <span>WISATA</span></a>
            </div>

            <div class="admin-user">
                <div class="avatar">
                    <?php echo e(substr(Auth::user()->name ?? 'A', 0, 1)); ?>

                </div>
                <span class="username"><?php echo e(Auth::user()->name ?? 'Admin'); ?></span>
            </div>

            <ul class="admin-menu">
                <li class="menu-header">Menu Utama</li>
                <li>
                    <a href="<?php echo e(route('admin.dashboard')); ?>">
                        <span class="icon">🏠</span> DASHBOARD
                    </a>
                </li>
                
                <!-- MENU DROPDOWN INFORMASI (DIPERBAIKI) -->
                <li>
                    <!-- Gunakan # dan onclick event -->
                    <a href="#" onclick="toggleMenu(event, 'submenu-info')" style="justify-content: space-between;">
                        <div style="display:flex; align-items:center;">
                            <span class="icon">ℹ️</span> INFORMASI
                        </div>
                        <span id="arrow-submenu-info">▼</span>
                    </a>
                    <!-- Submenu -->
                    <ul id="submenu-info" class="submenu">
                        <li>
                            <a href="<?php echo e(route('admin.berita.index')); ?>">
                                📰 Berita
                            </a>
                        </li>
                        <li>
                            <a href="#" style="opacity: 0.7;">
                                🏷️ Kategori (Soon)
                            </a>
                        </li>
                        <li>
                            <a href="#" style="opacity: 0.7;">
                                📢 Pengumuman (Soon)
                            </a>
                        </li>
                        <li>
                            <a href="#" style="opacity: 0.7;">
                                📅 Event (Soon)
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo e(route('admin.destinasi.index')); ?>">
                        <span class="icon">🏝️</span> DESTINASI WISATA
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.kebudayaan.index')); ?>">
                        <span class="icon">🎭</span> KEBUDAYAAN
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.sliders.index')); ?>">
                        <span class="icon">🖼️</span> KONFIGURASI BERANDA
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.galeri.index')); ?>">
                        <span class="icon">📸</span> GALERI & ALBUM
                    </a>
                </li>
                
                <li class="menu-header">Lainnya</li>
                 <li>
                    <a href="/">
                        <span class="icon">🌍</span> LIHAT WEBSITE
                    </a>
                </li>
            </ul>
        </aside>

        <!-- ==== KONTEN UTAMA ==== -->
        <main class="admin-main-content">
            <header class="admin-main-header">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </header>

            <div class="admin-content-area">
                <?php if(session('success')): ?>
                    <div class="flash-message success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="flash-message error"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
                
                <div class="admin-content-box">
                    <?php echo e($slot); ?>

                </div>
            </div>
        </main>
    </div>

    <!-- SCRIPT JAVASCRIPT UNTUK DROPDOWN -->
    <script>
        function toggleMenu(e, id) {
            e.preventDefault(); // Mencegah link berpindah halaman / scroll ke atas
            
            var submenu = document.getElementById(id);
            var arrow = document.getElementById('arrow-' + id);
            
            // Cek status display saat ini
            // Menggunakan getComputedStyle untuk memastikan status yang akurat
            var currentDisplay = window.getComputedStyle(submenu).display;

            if (currentDisplay === "none") {
                submenu.style.display = "block";
                if(arrow) arrow.innerHTML = "▲";
            } else {
                submenu.style.display = "none";
                if(arrow) arrow.innerHTML = "▼";
            }
        }
    </script>

</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>