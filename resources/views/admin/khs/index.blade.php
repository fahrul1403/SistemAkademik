@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Data KHS</h1>

    <a href="{{ route('admin.khs.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-700 hover:to-blue-900 text-white font-bold py-2 px-4 rounded-full mb-4 inline-flex items-center transition-all duration-300">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
        </svg>
        Tambah KHS
    </a>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded-lg shadow-md flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto shadow-lg rounded-lg">
        <table class="min-w-full bg-white border rounded-lg">
            <thead>
                <tr class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white">
                    <th class="py-3 px-4 border">No</th>
                    <th class="py-3 px-4 border">Mahasiswa</th>
                    <th class="py-3 px-4 border">Mata Kuliah</th>
                    <th class="py-3 px-4 border">Semester</th>
                    <th class="py-3 px-4 border">Tahun Akademik</th>
                    <th class="py-3 px-4 border">Nilai Angka</th>
                    <th class="py-3 px-4 border">Nilai Huruf</th>
                    <th class="py-3 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khs as $index => $kh)
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="py-3 px-4 border">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 border">{{ $kh->user->username }}</td>
                        <td class="py-3 px-4 border">{{ $kh->matkul->matkul }}</td>
                        <td class="py-3 px-4 border">{{ $kh->semester }}</td>
                        <td class="py-3 px-4 border">{{ $kh->tahun_akademik }}</td>
                        <td class="py-3 px-4 border">{{ $kh->nilai_angka }}</td>
                        <td class="py-3 px-4 border">{{ $kh->nilai_huruf }}</td>
                        <td class="py-3 px-4 border flex space-x-2">
                            <a href="{{ route('admin.khs.edit', $kh->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded-full flex items-center transition-all duration-300">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0h-3M6 12H3m9-9v18m0-12H6m6 12h6"></path>
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.khs.destroy', $kh->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full flex items-center transition-all duration-300" onclick="return confirm('Yakin ingin menghapus?')">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
