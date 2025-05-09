@extends('layouts.orangtua') <!-- Menyertakan layout orang tua -->

@section('content') <!-- Memulai section untuk konten -->
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">


    <h1 class="text-2xl font-bold text-center">KRS Mahasiswa</h1>
    <p class="mt-4 text-center">Berikut adalah KRS yang berhasil diambil oleh mahasiswa.</p>

    <!-- Tabel KHS -->
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Mata Kuliah</th>
                    <th class="py-2 px-4 border-b text-center">Semester</th>
                    <th class="py-2 px-4 border-b text-center">Tahun Akademik</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b text-center">Matematika Dasar</td>
                    <td class="py-2 px-4 border-b text-center">2</td>
                    <td class="py-2 px-4 border-b text-center">2</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b text-center">Fisika Dasar</td>
                    <td class="py-2 px-4 border-b text-center">7</td>
                    <td class="py-2 px-4 border-b text-center">1</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border-b text-center">Bahasa Indonesia</td>
                    <td class="py-2 px-4 border-b text-center">5</td>
                    <td class="py-2 px-4 border-b text-center">2024</td>
                </tr>
            </tbody>
        </table>
    </div>


    </div>  <!-- Konsultasi dan Notifikasi -->
</div>
<div class="mt-8">
    <h2 class="text-2xl font-semibold mb-4 text-purple-600">Notifikasi <i class="fas fa-bell mr-2"></i> </h2>   <!-- Notifikasi -->
    @if(session('success'))
        <div class="mt-4 bg-green-500 text-white p-4 rounded shadow-md">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-lg font-semibold mb-2 text-purple-800">Notifikasi Terbaru</h3>
        <ul class="list-disc ml-5 text-gray-700">
            <li>Mahasiswa telah berhasil mengisi KHS.</li>
            <li>Pembayaran Mahasiswa telah dikonfirmasi.</li>
        </ul>
    </div>
</div>

<!-- Konsultasi -->
<div class="mt-8">
    <h2 class="text-2xl font-semibold mb-4 text-purple-600">Konsultasi</h2>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-gray-700 mb-4">Jika Anda memerlukan bantuan atau ingin berkonsultasi, silakan hubungi kami melalui:</p>
        <div class="flex space-x-4">
            <!-- Email -->
            <a href="mailto:example@email.com" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition">
                <i class="fas fa-envelope mr-2"></i>Email
            </a>
            <!-- WhatsApp -->
            <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition">
                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
            </a>
        </div>
    </div>
</div>

@endsection <!-- Menutup section untuk konten -->
