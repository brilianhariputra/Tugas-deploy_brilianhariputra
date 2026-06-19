public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'kelas' => 'required|string|max:100',
    ]);

    \App\Models\Santri::create([
        'nama'  => $request->nama,
        'kelas' => $request->kelas,
        'status' => 'Hadir', 
    ]);

    return redirect()->route('absensi.index')->with('success', 'Data berhasil!');
}