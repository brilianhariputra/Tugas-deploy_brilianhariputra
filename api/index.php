<?php
// Tampilkan isi direktori saat ini (Vercel Root)
echo "<h1>Isi Direktori Root:</h1><pre>";
print_r(scandir(__DIR__ . '/..'));
echo "</pre>";

// Tampilkan isi folder bootstrap jika ada
$bootstrapPath = __DIR__ . '/../bootstrap';
if (is_dir($bootstrapPath)) {
    echo "<h1>Isi Folder Bootstrap:</h1><pre>";
    print_r(scandir($bootstrapPath));
    echo "</pre>";
} else {
    echo "<h1>Folder Bootstrap TIDAK DITEMUKAN di: $bootstrapPath</h1>";
}
exit;