@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Mata Kuliah</h1>

<form action="{{ route('admin.matkul.update', $matkul->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
        <input type="text" name="kode" id="kode" value="{{ $matkul->kode }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="matkul" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
        <input type="text" name="matkul" id="matkul" value="{{ $matkul->matkul }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="sks" class="block text-sm font-medium text-gray-700">SKS</label>
        <input type="number" name="sks" id="sks" value="{{ $matkul->sks }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
        <input type="text" name="kategori" id="kategori" value="{{ $matkul->kategori }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="smt" class="block text-sm font-medium text-gray-700">Semester</label>
        <input type="number" name="smt" id="smt" value="{{ $matkul->smt }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="semester" class="block text-sm font-medium text-gray-700">Semester (Ganjil/Genap)</label>
        <input type="text" name="semester" id="semester" value="{{ $matkul->semester }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="id_prodi" class="block text-sm font-medium text-gray-700">ID Program Studi</label>
        <input type="number" name="id_prodi" id="id_prodi" value="{{ $matkul->id_prodi }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
