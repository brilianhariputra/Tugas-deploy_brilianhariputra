<?php
use App\Http\Controllers\TugasController;
Route::get('/', [TugasController::class, 'index']);