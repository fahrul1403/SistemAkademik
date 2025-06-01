@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-center text-blue-600 mb-6">Profil Anda</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-lg mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Card Profil Singkat --}}
    <div class="text-center mb-8">
        <h2 class="text-xl font-bold text-gray-800">{{ $profile->nama_lengkap }}</h2>
        <p class="text-gray-600">{{ $user->email }}</p>
        <p class="text-gray-600">NIM: {{ $profile->nim }}</p>
        <p class="text-gray-600">Fakultas: {{ $profile->fakultas ?? '-' }}</p>
        <p class="text-gray-600">Program Studi: {{ $profile->prodi ?? '-' }}</p>
    </div>

    {{-- Form untuk update profil --}}
    <form action="{{ route('profile.update') }}" method="POST" class="bg-gray-50 p-6 rounded-lg shadow-md">
        @csrf
        {{-- Nama Lengkap --}}
        <div class="mb-4">
            <label for="nama_lengkap" class="block text-gray-700 font-semibold">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $profile->nama_lengkap) }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        {{-- NIM --}}
        <div class="mb-4">
            <label for="nim" class="block text-gray-700 font-semibold">NIM</label>
            <input type="text" id="nim" name="nim" value="{{ old('nim', $profile->nim) }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        {{-- Jenis Kelamin --}}
        <div class="mb-4">
            <label for="jenis_kelamin" class="block text-gray-700 font-semibold">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        {{-- Tempat Lahir --}}
        <div class="mb-4">
            <label for="tempat_lahir" class="block text-gray-700 font-semibold">Tempat Lahir</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $profile->tempat_lahir) }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        {{-- Tanggal Lahir --}}
        <div class="mb-4">
            <label for="tanggal_lahir" class="block text-gray-700 font-semibold">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        {{-- Alamat --}}
        <div class="mb-4">
            <label for="alamat" class="block text-gray-700 font-semibold">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('alamat', $profile->alamat) }}</textarea>
        </div>

        {{-- Fakultas --}}
        <div class="mb-4">
            <label for="fakultas" class="block text-gray-700 font-semibold">Fakultas</label>
            <input type="text" id="fakultas" name="fakultas" value="{{ old('fakultas', $profile->fakultas) }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        {{-- Prodi --}}
        <div class="mb-4">
            <label for="prodi" class="block text-gray-700 font-semibold">Program Studi</label>
            <input type="text" id="prodi" name="prodi" value="{{ old('prodi', $profile->prodi) }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        {{-- Angkatan --}}
        <div class="mb-4">
            <label for="angkatan" class="block text-gray-700 font-semibold">Angkatan</label>
            <input type="text" id="angkatan" name="angkatan" value="{{ old('angkatan', $profile->angkatan) }}" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out">Perbarui Profil</button>
    </form>
</div>
@endsection
