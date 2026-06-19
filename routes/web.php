<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TugasController::class, 'index'])->name('absensi.index');
Route::post('/absensi/simpan', [TugasController::class, 'store'])->name('absensi.store');