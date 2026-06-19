<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $appName }}</title>
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
        .form-row { display: flex; gap: 10px; flex-wrap: wrap; }
        .form-row input, .form-row select { flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; min-width: 150px; }
        .btn-green { background: #1a5c38; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 14px; }
        .btn-green:hover { background: #145230; }
        .btn-red { background: #dc3545; color: white; border: none; padding: 5px 12px; border-radius: 4px; cursor: pointer; font-size: 13px; }
        .btn-red:hover { background: #b02a37; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; font-size: 14px; }
        th { font-weight: bold; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; display: inline-block; }
        .badge-hadir { background: #d4edda; color: #155724; }
        .badge-tidakhadir { background: #f8d7da; color: #721c24; }
        .badge-izin { background: #fff3cd; color: #856404; }
        .badge-alpa { background: #e2e3e5; color: #383d41; }
        .alert { padding: 10px 15px; border-radius: 6px; margin-bottom: 15px; background: #d4edda; color: #155724; }
        .filter-row { display: flex; gap: 10px; margin-bottom: 15px; align-items: center; }
        .filter-row select { padding: 8px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; }
        .filter-row a { font-size: 13px; color: #1a5c38; }
        select.status-select { padding: 4px 8px; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; }
    </style>
</head>
<body>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="{{ route('absensi.index') }}" class="active">Absensi Santri</a>
    <a href="{{ route('kelas.index') }}">Data Kelas</a>
    <a href="{{ route('pengaturan.index') }}">Pengaturan</a>
</div>
<div class="main">
    <h1>Dashboard Absensi Santri</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="card">
        <h3 style="margin-bottom:15px;">Tambah Data Absensi</h3>
        <form method="POST" action="{{ route('absensi.store') }}">
            @csrf
            <div class="form-row">
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
                <input type="text" name="kelas" placeholder="Kelas" required>
                <select name="status" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak Hadir">Tidak Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Alpa">Alpa</option>
                </select>
                <button type="submit" class="btn-green">Simpan Data</button>
            </div>
        </form>
    </div>

    <div class="card">
        <div class="filter-row">
            <form method="GET" action="{{ route('absensi.index') }}" style="display:flex;gap:10px;align-items:center;">
                <select name="kelas" onchange="this.form.submit()">
                    <option value="">Semua Kelas</option>
                    @foreach($kelasList as $k)
                        <option value="{{ $k }}" {{ request('kelas') == $k ? 'selected' : '' }}>Kelas {{ $k }}</option>
                    @endforeach
                </select>
                @if(request('kelas'))
                    <a href="{{ route('absensi.index') }}">Reset</a>
                @endif
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nama Santri</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($santris as $santri)
                <tr>
                    <td>{{ $santri->nama }}</td>
                    <td>{{ $santri->kelas }}</td>
                    <td>
                        <form method="POST" action="{{ route('absensi.updateStatus', $santri->id) }}" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="status-select" onchange="this.form.submit()">
                                @foreach(['Hadir','Tidak Hadir','Izin','Alpa'] as $s)
                                    <option value="{{ $s }}" {{ $santri->status == $s ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('absensi.destroy', $santri->id) }}" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-red">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center;color:#999;">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>