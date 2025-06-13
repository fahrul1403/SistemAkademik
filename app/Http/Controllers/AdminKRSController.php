<?php
namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\User;
use App\Models\Matkul;
use Illuminate\Http\Request;

class AdminKRSController extends Controller
{
    public function index()
    {
        $krs = Krs::with('user', 'matkul')->get();
        return view('admin.krs.index', compact('krs'));
    }

    public function create()
    {
        $mahasiswas = User::where('role', 'mahasiswa')->get();
        $matkuls = Matkul::all();
        return view('admin.krs.create', compact('mahasiswas', 'matkuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_matkul' => 'required|exists:matkuls,id',
            'semester' => 'required',
            'tahun_akademik' => 'required',
        ]);

        Krs::create($request->all());
        return redirect()->route('admin.krs.index')->with('success', 'KRS berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $krs = Krs::findOrFail($id);
        $mahasiswas = User::where('role', 'mahasiswa')->get();
        $matkuls = Matkul::all();
        return view('admin.krs.edit', compact('krs', 'mahasiswas', 'matkuls'));
    }

    public function update(Request $request, KRS $krs)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_matkul' => 'required|exists:matkuls,id',
            'semester' => 'required',
            'tahun_akademik' => 'required',
        ]);

        $krs->update($request->all());
        return redirect()->route('admin.krs.index')->with('success', 'KRS berhasil diupdate.');
    }

    public function destroy(KRS $krs)
    {
        $krs->delete();
        return redirect()->route('admin.krs.index')->with('success', 'KRS berhasil dihapus.');
    }
}
