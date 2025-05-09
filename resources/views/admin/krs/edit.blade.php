@extends('layouts.admin')

@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-blue-600">Edit KRS</h1>

    <form action="{{ route('admin.krs.update', $krs->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Mahasiswa</label>
            <select name="id_user" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Mahasiswa</option>
                @foreach ($mahasiswas as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}" {{ $mahasiswa->id == $krs->id_user ? 'selected' : '' }}>
                        {{ $mahasiswa->username }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
            <select name="id_matkul" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Mata Kuliah</option>
                @foreach ($matkuls as $matkul)
                    <option value="{{ $matkul->id }}" {{ $matkul->id == $krs->id_matkul ? 'selected' : '' }}>
                        {{ $matkul->matkul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Semester</label>
            <input type="text" name="semester" value="{{ old('semester', $krs->semester) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tahun Akademik</label>
            <input type="text" name="tahun_akademik" value="{{ old('tahun_akademik', $krs->tahun_akademik) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 flex items-center">
            <i class="fas fa-save mr-2"></i> Simpan KRS
        </button>
    </form>
</div>

@endsection
