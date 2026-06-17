<?php
// Paksa tampilkan setiap detail error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Debug Mode Aktif</h1>";

// Cek apakah file utama ada
$path = __DIR__ . '/../public/index.php';
if (!file_exists($path)) {
    die("File public/index.php tidak ditemukan di: " . $path);
}

echo "Memuat Laravel...<br>";
require $path;