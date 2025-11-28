<x-app-layout>
    <style>
        .welcome-banner {
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920');
            background-size: cover;
            background-position: center;
            padding: 100px 40px;
            border-radius: 10px;
            color: white;
            margin-bottom: 30px;
            overflow: hidden;
        }
        .welcome-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5);
        }
        .welcome-content {
            position: relative;
            z-index: 2;
        }
        .welcome-content h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .welcome-content p {
            font-size: 18px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .stat-card {
            background: #343a40;
            color: white;
            padding: 25px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .stat-card .info h3 {
            font-size: 28px;
            font-weight: 700;
        }
        .stat-card .info p {
            font-size: 14px;
            color: #c2c7d0;
            text-transform: uppercase;
        }
        .stat-card .icon {
            font-size: 42px;
            opacity: 0.5;
        }
    </style>

    <div class="welcome-banner">
        <div class="welcome-content">
            <h1>Selamat Datang Admin</h1>
            <p>Web Destinasi Wisata</p>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="info">
                <h3>{{ $total_destinasi }}</h3>
                <p>Destinasi Wisata</p>
            </div>
            <div class="icon">🏝️</div>
        </div>
        <div class="stat-card">
            <div class="info">
                <h3>{{ $total_berita }}</h3>
                <p>Berita</p>
            </div>
            <div class="icon">📰</div>
        </div>
        <div class="stat-card">
            <div class="info">
                <h3>0</h3>
                <p>Seni & Kebudayaan</p>
            </div>
            <div class="icon">🎭</div>
        </div>
        <div class="stat-card">
            <div class="info">
                <h3>0</h3>
                <p>Event</p>
            </div>
            <div class="icon">📅</div>
        </div>
    </div>

</x-app-layout>