<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        // Debugging: Kita pastikan controller dipanggil
        // Jika berhasil, Anda akan melihat teks ini, bukan halaman Laravel
        return "Controller TugasController berhasil dipanggil!";
    }
}