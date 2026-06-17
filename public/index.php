<?php
// Paksa tampilkan error untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Mencegah error akses file di Vercel
putenv('CACHE_DRIVER=array');
putenv('SESSION_DRIVER=array');
putenv('VIEW_COMPILED_PATH=/tmp');

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();

$kernel->terminate($request, $response);