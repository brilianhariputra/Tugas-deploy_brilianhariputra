<?php
define('LARAVEL_START', microtime(true));
require dirname(__DIR__) . '/vendor/autoload.php';
$app = require dirname(__DIR__) . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(\Illuminate\Http\Request::capture())->send();
<?php

// Arahkan ke file index.php milik Laravel di folder public
require __DIR__ . '/../public/index.php';