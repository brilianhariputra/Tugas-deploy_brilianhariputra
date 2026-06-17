<?php
// Test 2: Debugging Laravel Bootstrap
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "TEST 2: Mencoba memuat Autoload...<br>";
$autoload = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoload)) {
    require $autoload;
    echo "Autoload sukses. Memuat Laravel...<br>";
    
    // Mencoba menjalankan minimal bootstrap
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    echo "Laravel bootstrap sukses!";
} else {
    echo "ERROR: vendor/autoload.php tidak ditemukan!";
}
die();