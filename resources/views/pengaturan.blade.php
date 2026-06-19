<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan - {{ $appName }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; display: flex; min-height: 100vh; background: #f5f5f5; }
        .sidebar { width: 220px; background: #1a5c38; color: white; padding: 20px; min-height: 100vh; }
        .sidebar h2 { font-size: 16px; font-weight: bold; margin-bottom: 30px; }
        .sidebar a { display: block; color: white; text-decoration: none; padding: 8px 0; font-size: 14px; }
        .sidebar a.active { font-weight: bold; color: #90ee90; }
        .main { flex: 1; padding: 30px; }
        h1 { font-size: 24px; margin-bottom: 20px; }
        .card { background: white; border-radius: 8px; padding: 20px; max-width: 500px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); }
        label { display: block; margin-bottom: 6px; font-size: 14px; font-weight: bold; }
        input[type=text] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; margin-bottom: 15px; }
        .btn-green { background: #1a5c38; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 14px; }
        .alert { padding: 10px 15px; border-radius: 6px; margin-bottom: 15px; background: #d4edda; color: #155724; }
    </style>
</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{ route('absensi.index') }}">Absensi Santri</a>
    <a href="{{ route('kelas.index') }}">Data Kelas</a>
    <a href="{{ route('pengaturan.index') }}" class="active">Pengaturan</a>
</div>
<div class="main">
    <h1>Pengaturan</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="card">
        <form method="POST" action="{{ route('pengaturan.simpan') }}">
            @csrf
            <label>Nama Aplikasi</label>
            <input type="text" name="app_name" value="{{ $appName }}" required>
            <button type="submit" class="btn-green">Simpan</button>
        </form>
    </div>
</div>
</body>
</html>