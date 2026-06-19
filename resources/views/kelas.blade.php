<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kelas - {{ $appName }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; display: flex; min-height: 100vh; background: #f5f5f5; }
        .sidebar { width: 220px; background: #1a5c38; color: white; padding: 20px; min-height: 100vh; }
        .sidebar h2 { font-size: 16px; font-weight: bold; margin-bottom: 30px; }
        .sidebar a { display: block; color: white; text-decoration: none; padding: 8px 0; font-size: 14px; }
        .sidebar a.active { font-weight: bold; color: #90ee90; }
        .main { flex: 1; padding: 30px; }
        h1 { font-size: 24px; margin-bottom: 20px; }
        .card { background: white; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); }
        .kelas-btn { display: inline-block; margin: 5px; padding: 10px 20px; background: #1a5c38; color: white; border-radius: 6px; text-decoration: none; font-size: 14px; }
        .kelas-btn.active { background: #145230; border: 2px solid #90ee90; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; font-size: 14px; }
        th { font-weight: bold; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
        .badge-hadir { background: #d4edda; color: #155724; }
        .badge-tidakhadir { background: #f8d7da; color: #721c24; }
        .badge-izin { background: #fff3cd; color: #856404; }
        .badge-alpa { background: #e2e3e5; color: #383d41; }
    </style>
</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{ route('absensi.index') }}">Absensi Santri</a>
    <a href="{{ route('kelas.index') }}" class="active">Data Kelas</a>
    <a href="{{ route('pengaturan.index') }}">Pengaturan</a>
</div>
<div class="main">
    <h1>Data Kelas</h1>
    <div class="card">
        <p style="margin-bottom:15px;font-size:14px;">Pilih kelas untuk melihat data absensi:</p>
        @foreach($kelasList as $k)
            <a href="{{ route('kelas.index', ['kelas' => $k]) }}"
               class="kelas-btn {{ $selectedKelas == $k ? 'active' : '' }}">
               Kelas {{ $k }}
            </a>
        @endforeach
    </div>

    @if($selectedKelas)
    <div class="card">
        <h3 style="margin-bottom:15px;">Absensi Kelas {{ $selectedKelas }}</h3>
        <table>
            <thead>
                <tr><th>Nama Santri</th><th>Status</th></tr>
            </thead>
            <tbody>
                @forelse($santris as $santri)
                <tr>
                    <td>{{ $santri->nama }}</td>
                    <td>
                        @php
                            $badgeClass = match($santri->status) {
                                'Hadir' => 'badge-hadir',
                                'Tidak Hadir' => 'badge-tidakhadir',
                                'Izin' => 'badge-izin',
                                'Alpa' => 'badge-alpa',
                                default => ''
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $santri->status }}</span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="2" style="text-align:center;color:#999;">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</div>
</body>
</html>