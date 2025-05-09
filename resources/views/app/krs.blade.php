@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-3xl font-bold mb-4 text-blue-600">Data KRS</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <!-- Form untuk Menambah dan Mengedit KRS -->
    <form action="{{ route('krs.submit') }}" method="POST" class="bg-white p-6 shadow-lg rounded-lg mb-4">
        @csrf
        <input type="hidden" name="krs_id" id="krs_id" value="">
        <div class="mb-4">
            <label for="id_matkul" class="block text-sm font-medium text-gray-700">Mata Kuliah:</label>
            <select name="id_matkul" id="id_matkul" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                <option value="" disabled selected>Pilih Mata Kuliah</option> <!-- Placeholder -->
                @foreach ($matkuls as $matkul)
                    <option value="{{ $matkul->id }}">{{ $matkul->matkul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="semester" class="block text-sm font-medium text-gray-700">Semester:</label>
            <input type="text" name="semester" id="semester" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="tahun_akademik" class="block text-sm font-medium text-gray-700">Tahun Akademik:</label>
            <input type="text" name="tahun_akademik" id="tahun_akademik" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
            <i class="fas fa-save"></i> Simpan KRS
        </button>
    </form>

    <!-- Tabel untuk Menampilkan Data KRS -->
    <div class="overflow-hidden bg-white shadow-lg rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Akademik</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($krsData as $krs)
                    <tr class="hover:bg-gray-100 transition duration-300">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $krs->matkul->matkul }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $krs->semester }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $krs->tahun_akademik }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition duration-300 edit-krs" data-id="{{ $krs->id }}" data-matkul="{{ $krs->id_matkul }}" data-semester="{{ $krs->semester }}" data-tahun="{{ $krs->tahun_akademik }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('krs.destroy', $krs->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition duration-300">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    <div class="mt-6">
        <a href="{{ route('app.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg">
            <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
        </a>
    </div>
<!-- JavaScript untuk menangani pengeditan KRS -->
<script>
    document.querySelectorAll('.edit-krs').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('krs_id').value = this.getAttribute('data-id');
            document.getElementById('id_matkul').value = this.getAttribute('data-matkul');
            document.getElementById('semester').value = this.getAttribute('data-semester');
            document.getElementById('tahun_akademik').value = this.getAttribute('data-tahun');
        });
    });
</script>

<!-- Tambahkan Font Awesome di bagian header jika belum ada -->
@section('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@endsection
