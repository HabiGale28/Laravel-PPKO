<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Desa - Wonderful Indonesia</title>
    
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
        /* Header (Sama seperti welcome.blade.php) */
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
        .content-section {
            background: #fff; padding: 80px 40px; color: #333;
        }
        .content-section.dark-bg {
             background: #0d1a2c; /* Warna biru tua */
             color: white;
        }
        .container { max-width: 1400px; margin: 0 auto; }

        /* --- CSS BARU UNTUK HALAMAN PROFIL --- */
        .profil-hero {
            height: 60vh; /* 60% tinggi layar */
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Ganti URL gambar ini dengan gambar profil desa Anda */
            background-image: url('https://foto.kontan.co.id/XWDrCNQ9WSvcXzPV0PkUIJHgZCs=/smart/2024/09/15/447037181p.jpg'); 
            background-size: cover;
            background-position: center;
            color: white;
            margin-top: 80px; /* Memberi ruang untuk header */
        }
        .profil-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7));
        }
        .profil-hero h1 {
            font-size: 56px;
            font-weight: 700;
            z-index: 2;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }

        /* Konten Profil & Sejarah */
        .profil-content .container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* 2 kolom */
            gap: 60px;
        }
        .profil-content h2 {
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #00bcd4; /* Garis bawah biru */
            display: inline-block;
        }
        .profil-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #eee;
            margin-bottom: 20px;
        }
        /* Responsive untuk profil */
        @media (max-width: 992px) {
            .profil-content .container {
                grid-template-columns: 1fr; /* 1 kolom di tablet */
            }
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
                    <li><a href="#wisata">🏝️ Wisata</a></li>
                    <li><a href="#kebudayaan">🎭 Kebudayaan</a></li>
                    <li><a href="#">📰 Berita</a></li> 
                    <li><a href="#informasi">ℹ️ Informasi</a></li>
                    <li><a href="#galeri">📸 Galeri</a></li>
                    <li><a href="#kontak">📞 Kontak</a></li>
                    
                    
                </ul>
            </nav>
        </div>
    </header>

    <section class="profil-hero">
        <h1>Profil Desa</h1>
    </section>

    <section class="content-section dark-bg profil-content">
        <div class="container">
            <div class="profil-column">
                <h2>Profil Desa</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="sejarah-column">
                <h2>Sejarah Desa</h2>
                <p>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                </p>
                <p>
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                </p>
            </div>
        </div>
    </section>

</body>
</html><?php /**PATH C:\xampp\htdocs\wonderful-indonesia-laravel\resources\views/profil-desa.blade.php ENDPATH**/ ?>