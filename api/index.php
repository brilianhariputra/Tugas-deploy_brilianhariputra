<?php
// Test 2: Cek apakah file autoload Laravel ditemukan
$autoload = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoload)) {
    require $autoload;
    echo "TEST 2: Autoload sukses! Laravel siap dimuat.";
} else {
    echo "TEST 2 ERROR: File vendor/autoload.php tidak ditemukan!";
}
die();