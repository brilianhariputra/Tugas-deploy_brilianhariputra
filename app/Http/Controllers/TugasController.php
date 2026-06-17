<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        // Mengambil data
        $data = DB::table('tugas')->get();

        // Mengirim ke view
        return view('tugas.index', ['tugas' => $data]);
    }
}