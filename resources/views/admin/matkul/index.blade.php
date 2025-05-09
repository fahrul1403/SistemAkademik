{{-- resources/views/admin/matkul/index.blade.php --}}

@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Mata Kuliah</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.matkul.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        <i class="fas fa-plus mr-1"></i> Tambah Mata Kuliah
    </a>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Kode</th>
                <th class="px-4 py-2">Mata Kuliah</th>
                <th class="px-4 py-2">SKS</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Semester</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matkuls as $matkul)
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2">{{ $matkul->id }}</td>
                    <td class="border px-4 py-2">{{ $matkul->kode }}</td>
                    <td class="border px-4 py-2">{{ $matkul->matkul }}</td>
                    <td class="border px-4 py-2">{{ $matkul->sks }}</td>
                    <td class="border px-4 py-2">{{ $matkul->kategori }}</td>
                    <td class="border px-4 py-2">{{ $matkul->semester }}</td>
                    <td class="border px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.matkul.edit', $matkul->id) }}" class="text-blue-500 flex items-center">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.matkul.destroy', $matkul->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 flex items-center">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
