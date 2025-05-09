<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan KHS dan KRS Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/collapse.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-6 flex justify-between items-center">
            <h1 class="text-xl font-bold">Sistem KHS & KRS</h1>
            <div class="space-x-4">
                <a href="#features" class="text-gray-600 hover:text-blue-500">Fitur</a>
                <a href="#about" class="text-gray-600 hover:text-blue-500">Tentang Kami</a>
                <a href="#contact" class="text-gray-600 hover:text-blue-500">Kontak</a>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-500">Login</a>
                <a href="{{ route('orangtua.login') }}" class="text-gray-600 hover:text-blue-500">Login Orang Tua</a> <!-- Menu Login Orang Tua -->
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-blue-600 text-white py-20">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold">Pengelolaan KHS dan KRS Mahasiswa</h2>
            <p class="mt-4 text-lg">Sistem interaktif untuk memudahkan pengelolaan KHS dan KRS Anda.</p>
            <a href="#features" class="mt-6 inline-block bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-200">Pelajari Lebih Lanjut</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-20">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Pengelolaan KRS</h3>
                    <p class="mt-2">Atur rencana studi Anda dengan mudah dan efisien.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Monitoring KHS</h3>
                    <p class="mt-2">Pantau hasil studi Anda secara real-time.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Laporan Cetak</h3>
                    <p class="mt-2">Cetak KHS dan KRS dalam format yang mudah diakses.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-gray-200 py-20">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold">Tentang Kami</h2>
            <p class="mt-4">Kami adalah tim pengembang yang berdedikasi untuk meningkatkan pengalaman belajar mahasiswa melalui teknologi.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold">Kontak Kami</h2>
            <p class="mt-4">Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami.</p>
            <a href="mailto:info@example.com" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg">Kirim Pesan</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Pengelolaan KHS dan KRS Mahasiswa. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
