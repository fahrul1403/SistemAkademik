<?php
namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Matkul;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    // Menampilkan daftar KRS
    public function index()
    {
        $krs = Krs::with('matkul')->where('user_id', auth()->id())->get();
        return view('admin.krs.index', compact('krs'));
    }

    // Menampilkan form untuk membuat KRS baru
    public function create()
    {
        $matkuls = Matkul::all();
        return view('admin.krs.create', compact('matkuls'));
    }

    // Menyimpan KRS baru
    public function store(Request $request)
    {
        $request->validate([
            'matkul_id' => 'required|exists:matkuls,id',
            'sks' => 'required|integer',
            'semester' => 'required|string|max:10',
        ]);

        Krs::create([
            'user_id' => auth()->id(),
            'matkul_id' => $request->matkul_id,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin.krs.index')->with('success', 'KRS berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit KRS
    public function edit($id)
    {
        $krs = Krs::findOrFail($id);
        $matkuls = Matkul::all();
        return view('admin.krs.edit', compact('krs', 'matkuls'));
    }

    // Memperbarui KRS yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'matkul_id' => 'required|exists:matkuls,id',
            'sks' => 'required|integer',
            'semester' => 'required|string|max:10',
        ]);

        $krs = Krs::findOrFail($id);
        $krs->update($request->all());

        return redirect()->route('admin.krs.index')->with('success', 'KRS berhasil diperbarui.');
    }

    // Menghapus KRS
    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect()->route('admin.krs.index')->with('success', 'KRS berhasil dihapus.');
    }
}