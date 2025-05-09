@extends('admin.layout')

@section('content')
<h1 class="text-xl font-bold mb-4">Buat KHS Baru</h1>

<form action="{{ route('admin.khs.store') }}" method="POST">
    @csrf
    <!-- Form input untuk data KHS -->
    <div class="mb-4">
        <label for="mahasiswa_id" class="block text-sm font-medium text-gray-700">ID Mahasiswa</label>
        <input type="text" name="mahasiswa_id" id="mahasiswa_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
    </div>

    <div class="mb-4">
        <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
        <input type="text" name="nilai" id="nilai" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
