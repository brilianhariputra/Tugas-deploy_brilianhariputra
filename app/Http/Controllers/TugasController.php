<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index(Request $request)
    {
        $query = Santri::latest();
        if ($request->kelas) {
            $query->where('kelas', $request->kelas);
        }
        $santris = $query->get();
        $kelasList = Santri::select('kelas')->distinct()->pluck('kelas');
        $appName = session('app_name', config('app.name'));
        return view('tugas', compact('santris', 'kelasList', 'appName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'kelas'  => 'required|string|max:100',
            'status' => 'required|in:Hadir,Tidak Hadir,Izin,Alpa',
        ]);

        Santri::create([
            'nama'   => $request->nama,
            'kelas'  => $request->kelas,
            'status' => $request->status,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Santri::findOrFail($id)->delete();
        return redirect()->route('absensi.index')->with('success', 'Data berhasil dihapus!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Hadir,Tidak Hadir,Izin,Alpa',
        ]);
        Santri::findOrFail($id)->update(['status' => $request->status]);
        return redirect()->route('absensi.index')->with('success', 'Status berhasil diubah!');
    }

    public function kelas(Request $request)
    {
        $kelasList = Santri::select('kelas')->distinct()->pluck('kelas');
        $selectedKelas = $request->kelas;
        $santris = $selectedKelas
            ? Santri::where('kelas', $selectedKelas)->latest()->get()
            : collect();
        $appName = session('app_name', config('app.name'));
        return view('kelas', compact('kelasList', 'santris', 'selectedKelas', 'appName'));
    }

    public function pengaturan()
    {
        $appName = session('app_name', config('app.name'));
        return view('pengaturan', compact('appName'));
    }

    public function pengaturanSimpan(Request $request)
    {
        $request->validate(['app_name' => 'required|string|max:100']);
        session(['app_name' => $request->app_name]);
        return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil disimpan!');
    }
}