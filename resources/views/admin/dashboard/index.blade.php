@extends('layouts.admin') <!-- Pastikan ini mengarah ke layout admin Anda -->

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card Total Mahasiswa -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-user-graduate fa-2x text-blue-500"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-lg font-semibold">Total Mahasiswa</h2>
                <p class="text-2xl font-bold">{{ $totalMahasiswa }}</p>
            </div>
        </div>

        <!-- Tambahkan card lainnya sesuai kebutuhan -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-book fa-2x text-green-500"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-semibold">Total Mata Kuliah</h2>
                <p class="text-2xl font-bold">{{ $totalMatakuliah }}</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-chalkboard-teacher fa-2x text-red-500"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-lg font-semibold">Total Dosen</h2>
                <p class="text-2xl font-bold">{{ $totalDosen }}</p>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <h2 class="text-2xl font-bold mb-4">Grafik Aktivitas Mahasiswa</h2>
        <!-- Anda dapat menggunakan pustaka grafik seperti Chart.js untuk menampilkan grafik -->
        <canvas id="mahasiswaChart" width="400" height="200"></canvas>
    </div>

    <!-- Script untuk grafik -->
    <script>
        const ctx = document.getElementById('mahasiswaChart').getContext('2d');
        const mahasiswaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
                datasets: [{
                    label: 'Aktivitas Mahasiswa',
                    data: [12, 19, 3, 5, 2, 3], // Ganti dengan data Anda
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
@endsection
