<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::all();
        return view('admin.matkul.index', compact('matkuls'));
    }

    public function create()
    {
        return view('admin.matkul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'matkul' => 'required',
            'sks' => 'required|integer',
            'kategori' => 'required',
            'smt' => 'required|integer',
            'semester' => 'required',
            'id_prodi' => 'required|integer',
        ]);

        Matkul::create($request->all());

        return redirect()->route('admin.matkul.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function show($id)
    {
        $matkul = Matkul::findOrFail($id);
        return view('admin.matkul.show', compact('matkul'));
    }

    public function edit($id)
    {
        $matkul = Matkul::findOrFail($id);
        return view('admin.matkul.edit', compact('matkul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'matkul' => 'required',
            'sks' => 'required|integer',
            'kategori' => 'required',
            'smt' => 'required|integer',
            'semester' => 'required',
            'id_prodi' => 'required|integer',
        ]);

        $matkul = Matkul::findOrFail($id);
        $matkul->update($request->all());

        return redirect()->route('admin.matkul.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();

        return redirect()->route('admin.matkul.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
