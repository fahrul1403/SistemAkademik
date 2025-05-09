@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold">Jumlah Mahasiswa</h2>
            <p class="text-2xl font-bold mt-2">{{ $jumlahMahasiswa }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold">Jumlah Orang Tua</h2>
            <p class="text-2xl font-bold mt-2">{{ $jumlahOrangTua }}</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-lg font-semibold">Jumlah KRS Terkonfirmasi</h2>
            <p class="text-2xl font-bold mt-2">{{ $jumlahKRS }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.kelola') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Kelola Data
        </a>
    </div>
</div>
@endsection
