<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

// Pastikan hanya satu route ini yang aktif
Route::get('/', [TugasController::class, 'index']);