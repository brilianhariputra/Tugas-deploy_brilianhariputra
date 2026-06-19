<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $santris = Santri::latest()->get();
        return view('tugas', compact('santris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
        ]);

        Santri::create([
            'nama'  => $request->nama,
            'kelas' => $request->kelas,
            'status' => 'Hadir',
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data berhasil!');
    }
}