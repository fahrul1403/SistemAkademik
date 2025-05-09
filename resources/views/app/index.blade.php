<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 min-h-screen">

    <div class="container mx-auto p-6">
        <!-- Header -->
        <header class="flex items-center justify-between bg-white p-4 rounded shadow-lg mb-6">
            <h1 class="text-3xl font-bold text-purple-700">Selamat Datang, {{ Auth::user()->username }}!</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-full shadow hover:bg-red-700 transition duration-300">Logout</button>
            </form>
        </header>

        {{-- <!-- Notifikasi -->
        @if(session('success'))
            <div class="mt-4 bg-green-500 text-white p-4 rounded shadow-md">
                {{ session('success') }}
            </div>
        @endif --}}

        <!-- Fitur Utama -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
            <div class="bg-gradient-to-br from-blue-100 via-blue-200 to-purple-200 p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                <h2 class="text-xl font-semibold mb-2 text-purple-800">Lihat Profil</h2>
                <p class="text-gray-700">Periksa dan ubah informasi profil Anda.</p>
                <a href="{{ route('profile') }}" class="mt-4 inline-block text-blue-600 font-semibold hover:underline">Akses Profil</a>
            </div>
            <div class="bg-gradient-to-br from-green-100 via-green-200 to-yellow-200 p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                <h2 class="text-xl font-semibold mb-2 text-green-800">Kelola KRS</h2>
                <p class="text-gray-700">Isi, edit, dan konfirmasi KRS Anda.</p>
                <a href="{{ route('krs') }}" class="mt-4 inline-block text-green-600 font-semibold hover:underline">Kelola KRS</a>
            </div>
            <div class="bg-gradient-to-br from-pink-100 via-pink-200 to-red-200 p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105">
                <h2 class="text-xl font-semibold mb-2 text-red-800">Kelola KHS</h2>
                <p class="text-gray-700">Lihat dan tambah data KHS Anda.</p>
                <a href="{{ route('khs') }}" class="mt-4 inline-block text-pink-600 font-semibold hover:underline">Kelola KHS</a>
            </div>
        </div>

        <!-- Konsultasi dan Notifikasi -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4 text-purple-600">Konsultasi dan Notifikasi</h2>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold mb-2 text-purple-800">Notifikasi Terbaru</h3>
                <ul class="list-disc ml-5 text-gray-700">
                    <li>Anda telah berhasil mengisi KRS.</li>
                    <li>Pembayaran Anda telah dikonfirmasi.</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
