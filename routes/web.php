<?php

use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TugasController::class, 'index'])->name('absensi.index');
Route::post('/absensi/simpan', [TugasController::class, 'store'])->name('absensi.store');
Route::delete('/absensi/{id}', [TugasController::class, 'destroy'])->name('absensi.destroy');
Route::patch('/absensi/{id}/status', [TugasController::class, 'updateStatus'])->name('absensi.updateStatus');

Route::get('/kelas', [TugasController::class, 'kelas'])->name('kelas.index');

Route::get('/pengaturan', [TugasController::class, 'pengaturan'])->name('pengaturan.index');
Route::post('/pengaturan', [TugasController::class, 'pengaturanSimpan'])->name('pengaturan.simpan');