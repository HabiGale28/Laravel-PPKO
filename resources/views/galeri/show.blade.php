<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $album->nama_album }} - Galeri Wonderful Indonesia</title>
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

        /* === 2. STYLE KHUSUS DETAIL ALBUM === */

        /* Hero / Banner Album */
        .album-hero {
            height: 60vh;
            background-image: url('{{ asset('uploads/albums/'.$album->cover_album) }}');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        .album-hero::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.8));
        }
        .hero-content { position: relative; z-index: 2; padding: 0 20px; }
        .hero-content h1 { font-size: 48px; font-weight: 700; margin-bottom: 15px; text-shadow: 0 2px 10px rgba(0,0,0,0.5); }
        .hero-content p { font-size: 18px; max-width: 700px; margin: 0 auto; opacity: 0.9; line-height: 1.6; }

        /* Container & Grid Foto */
        .container { max-width: 1200px; margin: 60px auto; padding: 0 20px; }
        
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .photo-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            height: 300px;
            cursor: pointer;
        }
        .photo-item:hover { transform: scale(1.02); z-index: 2; }
        
        .photo-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .photo-caption {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 20px;
            color: white;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .photo-item:hover .photo-caption { opacity: 1; }

        .back-btn {
            display: inline-block;
            margin-bottom: 30px;
            color: #555;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        .back-btn:hover { color: #00bcd4; }

        /* Pagination */
        .pagination-wrapper { margin-top: 50px; display: flex; justify-content: center; }

        @media (max-width: 768px) {
            .photo-grid { grid-template-columns: repeat(2, 1fr); }
            .hero-content h1 { font-size: 36px; }
        }
        @media (max-width: 480px) {
            .photo-grid { grid-template-columns: 1fr; }
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
                    <li><a href="{{ route('home') }}">🏠 Beranda</a></li>
                    <li><a href="{{ route('profil.desa') }}">👤 Profil</a></li>
                    <li><a href="{{ route('wisata.index') }}">🏝️ Wisata</a></li>
                    <li><a href="{{ route('kebudayaan.index') }}">🎭 Kebudayaan</a></li>
                    <li><a href="#">📰 Berita</a></li> 
                    <li><a href="#informasi">ℹ️ Informasi</a></li>
                    
                    <li><a href="{{ route('galeri.index') }}" style="color: #00bcd4;">📸 Galeri</a></li>
                    
                    <li><a href="#kontak">📞 Kontak</a></li>
                    
                    </ul>
            </nav>
        </div>
    </header>

    <div class="album-hero">
        <div class="hero-content">
            <h1>{{ $album->nama_album }}</h1>
            <p>{{ $album->deskripsi }}</p>
        </div>
    </div>

    <div class="container">
        <a href="{{ route('galeri.index') }}" class="back-btn">← Kembali ke Daftar Album</a>

        @if($fotos->count() > 0)
            <div class="photo-grid">
                @foreach($fotos as $foto)
                <div class="photo-item">
                    <img src="{{ asset('uploads/fotos/'.$foto->file_foto) }}" alt="{{ $foto->judul_foto }}">
                    @if($foto->judul_foto)
                    <div class="photo-caption">
                        <span>{{ $foto->judul_foto }}</span>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            
            <div class="pagination-wrapper">
                {{ $fotos->links() }}
            </div>
        @else
            <div style="text-align: center; padding: 50px; color: #999;">
                <h3>Album ini belum memiliki foto.</h3>
            </div>
        @endif
    </div>

</body>
</html>