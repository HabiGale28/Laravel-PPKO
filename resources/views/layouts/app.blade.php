<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} - Wonderful Indonesia</title>

    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #f4f7f6; }
        .admin-header { background: #fff; padding: 15px 30px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; }
        .admin-header h1 { font-size: 20px; color: #009688; }
        .admin-nav { display: flex; gap: 20px; }
        .admin-nav a { text-decoration: none; color: #333; font-weight: 500; }
        .user-info { display: flex; align-items: center; gap: 15px; }
        .logout-btn { background: #f44336; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none; font-size: 14px; }
        .admin-container { max-width: 1400px; margin: 30px auto; padding: 30px; background: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 15px; border: 1px solid #ddd; text-align: left; }
        th { background: #009688; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .btn { padding: 8px 15px; border-radius: 5px; text-decoration: none; font-size: 14px; display: inline-block; border: none; cursor: pointer; }
        .btn-add { background: #009688; color: white; }
        .btn-edit { background: #2196F3; color: white; }
        .btn-delete { background: #f44336; color: white; }
    </style>
</head>
<body>
    <header class="admin-header">
        <h1><span class="wonderful">Wonderful</span> Indonesia - Admin</h1>
        <nav class="admin-nav">
            <a href="{{ route('admin.berita.index') }}">Berita</a>
            </nav>
        <div class="user-info">
            <span>Halo, <strong>{{ Auth::user()->name }}</strong></span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </header>

    <main class="admin-container">
        {{ $slot }}
    </main>
</body>
</html>