<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

// Halaman utama (Dashboard Absensi)
Route::get('/', [TugasController::class, 'index'])->name('absensi.index');

// Route untuk CRUD (Contoh nanti jika Anda butuh menambah/mengedit data)
// Route::get('/absensi/tambah', [TugasController::class, 'create']);
// Route::post('/absensi/simpan', [TugasController::class, 'store']);