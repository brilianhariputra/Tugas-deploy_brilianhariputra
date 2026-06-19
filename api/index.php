$content = [System.Text.Encoding]::UTF8.GetBytes('<?php
define(''LARAVEL_START'', microtime(true));
require dirname(__DIR__) . ''/vendor/autoload.php'';
$app = require dirname(__DIR__) . ''/bootstrap/app.php'';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(\Illuminate\Http\Request::capture())->send();')

[System.IO.File]::WriteAllBytes("api\index.php", $content)
Get-Content api\index.php