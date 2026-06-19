<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <div class="w-64 bg-green-900 text-white p-6">
            <h2 class="text-xl font-bold mb-10">Admin Panel</h2>
            <ul>
                <li class="mb-4 text-green-300 font-semibold">Absensi Santri</li>
                <li class="mb-4 hover:text-white cursor-pointer">Data Kelas</li>
                <li class="hover:text-white cursor-pointer">Pengaturan</li>
            </ul>
        </div>

        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Absensi Santri</h1>

            <div class="bg-white p-6 rounded-lg shadow-sm mb-8">
                <h3 class="font-bold text-lg mb-4">Tambah Data Absensi</h3>
                <form action="/" method="POST" class="flex gap-4">
                    @csrf
                    <input name="nama" placeholder="Nama Lengkap" class="border p-2 rounded w-1/3" required>
                    <input name="kelas" placeholder="Kelas" class="border p-2 rounded w-1/3" required>
                    <button class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Simpan Data</button>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4 border-b">Nama Santri</th>
                            <th class="p-4 border-b">Kelas</th>
                            <th class="p-4 border-b">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($santris as $s)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 border-b">{{ $s->nama }}</td>
                            <td class="p-4 border-b">{{ $s->kelas }}</td>
                            <td class="p-4 border-b">
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm font-bold">{{ $s->status }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="p-6 text-center text-gray-400">Belum ada data, silakan tambahkan data di atas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>