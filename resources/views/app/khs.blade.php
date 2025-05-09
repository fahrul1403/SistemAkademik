@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-4xl font-bold text-blue-600 mb-6">Data KHS Anda <i class="fas fa-book-open"></i></h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-4">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if ($khsData->isEmpty())
        <p class="text-gray-500">Tidak ada data KHS yang tersedia. <i class="fas fa-exclamation-circle"></i></p>
    @else
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-3 px-4 border-b text-left text-blue-700">Semester</th>
                    <th class="py-3 px-4 border-b text-left text-blue-700">Mata Kuliah</th>
                    <th class="py-3 px-4 border-b text-left text-blue-700">Nilai</th>
                    <th class="py-3 px-4 border-b text-left text-blue-700">Tahun Akademik</th>
                    <th class="py-3 px-4 border-b text-left text-blue-700">Tanggal</th>
                    <th class="py-3 px-4 border-b text-left text-blue-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khsData as $khs)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="py-2 px-4 border-b">{{ $khs->semester }}</td>
                        <td class="py-2 px-4 border-b">{{ $khs->matkul->matkul }}</td>
                        <td class="py-2 px-4 border-b">{{ $khs->nilai_angka }}</td>
                        <td class="py-2 px-4 border-b">{{ $khs->tahun_akademik }}</td>
                        <td class="py-2 px-4 border-b">{{ $khs->created_at->format('d-m-Y') }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('admin.khs.destroy', $khs->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                            <button type="button" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded-lg" onclick="editKHS({{ $khs->id }}, '{{ $khs->semester }}', '{{ $khs->nilai_angka }}', '{{ $khs->id_matkul }}', '{{ $khs->tahun_akademik }}')">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2 class="text-3xl font-bold mt-8 mb-4 text-blue-600">Tambah / Edit KHS <i class="fas fa-plus-circle"></i></h2>
    <form action="{{ route('khs.submit') }}" method="POST" class="mt-4 bg-white shadow-md rounded-lg p-6" id="khsForm">
        @csrf
        <input type="hidden" id="khs_id" name="khs_id" value="">
        
        <div class="mb-4">
            <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
            <input type="text" id="semester" name="semester" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="id_matkul" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
            <select id="id_matkul" name="id_matkul" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Mata Kuliah</option>
                @foreach ($matkuls as $matkul)
                    <option value="{{ $matkul->id }}">{{ $matkul->matkul }}</option> <!-- Pastikan 'nama' adalah kolom yang ada di tabel mata kuliah -->
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="nilai_angka" class="block text-sm font-medium text-gray-700">Nilai</label>
            <input type="text" id="nilai_angka" name="nilai_angka" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="tahun_akademik" class="block text-sm font-medium text-gray-700">Tahun Akademik</label>
            <input type="text" id="tahun_akademik" name="tahun_akademik" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            <i class="fas fa-save"></i> Simpan KHS
        </button>
    </form>

    <div class="mt-6">
        <a href="{{ route('app.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
            <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
        </a>
    </div>
</div>

<script>
    function editKHS(id, semester, nilai_angka, id_matkul, tahun_akademik) {
        document.getElementById('khs_id').value = id;
        document.getElementById('semester').value = semester;
        document.getElementById('nilai_angka').value = nilai_angka;
        document.getElementById('id_matkul').value = id_matkul; // Set id_matkul
        document.getElementById('tahun_akademik').value = tahun_akademik; // Set tahun_akademik
    }
</script>
@endsection
