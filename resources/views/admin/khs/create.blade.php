@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah KHS</h1>

    <form action="{{ route('admin.khs.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Mahasiswa</label>
            <select name="id_user" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @foreach ($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
            <select name="id_matkul" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @foreach ($matkuls as $matkul)
                    <option value="{{ $matkul->id }}">{{ $matkul->matkul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Semester</label>
            <input type="text" name="semester" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nilai Angka</label>
            <input type="number" name="nilai_angka" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nilai Huruf</label>
            <select name="nilai_huruf" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
            </select>
        </div>

        <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
            </svg>
            Simpan
        </button>
    </form>
</div>
@endsection
