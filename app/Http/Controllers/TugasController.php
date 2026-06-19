<?php

namespace App\Http\Controllers;

use App\Models\Santri; // Jangan lupa import Model Santri
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Menampilkan halaman utama absensi dengan data santri
     */
    public function index()
    {
        // 1. Ambil semua data santri dari database
        $santris = Santri::all();
        
        // 2. Kirim data tersebut ke file resources/views/tugas.blade.php
        return view('tugas', compact('santris'));
    }

    /**
     * Menyimpan data santri baru
     */
    public function store(Request $request)
    {
        Santri::create($request->all());
        return redirect('/');
    }
}