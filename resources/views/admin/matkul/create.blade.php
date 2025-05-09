@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Tambah Mata Kuliah</h1>

<div class="bg-white shadow-lg rounded-lg p-6">
    <form action="{{ route('admin.matkul.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="mb-4">
            <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
            <input type="text" name="kode" id="kode" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="matkul" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
            <input type="text" name="matkul" id="matkul" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="sks" class="block text-sm font-medium text-gray-700">SKS</label>
            <input type="number" name="sks" id="sks" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="smt" class="block text-sm font-medium text-gray-700">Semester</label>
            <input type="number" name="smt" id="smt" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="semester" class="block text-sm font-medium text-gray-700">Semester (Ganjil/Genap)</label>
            <input type="text" name="semester" id="semester" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="id_prodi" class="block text-sm font-medium text-gray-700">ID Program Studi</label>
            <input type="number" name="id_prodi" id="id_prodi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">Simpan</button>
    </form>
</div>
@endsection
