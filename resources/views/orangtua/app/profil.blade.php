@extends('layouts.orangtua')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center">Profil Mahasiswa</h1>
    <p class="mt-4 text-center">Berikut adalah data profil mahasiswa.</p>

    <!-- Tabel Profil -->
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white">
            <tbody>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">Nama Lengkap</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">NIM</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->nim }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">Jenis Kelamin</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">Tempat Lahir</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">Tanggal Lahir</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">Program Studi</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->prodi }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">Fakultas</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->fakultas }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">Angkatan</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->angkatan }}</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 font-semibold border-b text-left">Alamat</td>
                    <td class="py-2 px-4 border-b text-left">{{ $profil->alamat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-8">
    <h2 class="text-2xl font-semibold mb-4 text-purple-600">Konsultasi</h2>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-gray-700 mb-4">Jika Anda memerlukan bantuan atau ingin berkonsultasi, silakan hubungi kami melalui:</p>
        <div class="flex space-x-4">
            <a href="mailto:example@email.com" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition">
                <i class="fas fa-envelope mr-2"></i>Email
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition">
                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection
