@extends('layouts.orangtua')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Selamat Datang di Dashboard Orang Tua</h1>

        {{-- <div class="relative">
            <a href="{{ route('orangtua.notifikasi') }}">
                <i class="fas fa-bell text-2xl text-blue-600 cursor-pointer"></i>
                @if(session('notification'))
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">1</span>
                @endif
            </a>
        </div> --}}

    </div>
    <div class="mt-6 text-center">
        <a href="{{ route('orangtua.logout') }}" class="bg-red-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-red-500 transition">Logout</a>
    </div>

    <!-- Menambahkan Kartu untuk informasi tambahan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-10">
        <a href="{{ route('orangtua.khs') }}" class="block">
            <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-book text-blue-600 text-3xl mr-2"></i>
                    <h2 class="font-bold text-lg">Monitoring KHS</h2>
                </div>
                <p class="mt-2">Lihat nilai dan perkembangan akademik mahasiswa Anda.</p>
            </div>
        </a>
        <a href="{{ route('orangtua.krs') }}" class="block">
            <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-pencil-alt text-blue-600 text-3xl mr-2"></i>
                    <h2 class="font-bold text-lg">KRS</h2>
                </div>
                <p class="mt-2">Daftar mata kuliah yang diambil oleh mahasiswa.</p>
            </div>
        </a>
        <a href="{{ route('orangtua.profil') }}" class="block">
            <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-user-graduate text-blue-600 text-3xl mr-2"></i>
                    <h2 class="font-bold text-lg">Profil Mahasiswa</h2>
                </div>
                <p class="mt-2">Lihat informasi profil lengkap mahasiswa Anda.</p>
            </div>
        </a>
        <a href="https://wa.me/6287762094227?text=Assalamualaikum%20Pak/Bu%20Dosen%2C%20saya%20ingin%20bertanya%20mengenai%20mata%20kuliah" target="_blank" class="block">
            <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-comments text-blue-600 text-3xl mr-2"></i>
                    <h2 class="font-bold text-lg">Hubungi Dosen</h2>
                </div>
                <p class="mt-2">Jika ada pertanyaan, Anda bisa menghubungi dosen.</p>
            </div>
        </a>
    </div>
</div>
@endsection <!-- Menutup section untuk konten -->
<script>
    function toggleNotification() {
        const notificationPopup = document.getElementById('notificationPopup');
        if (notificationPopup.style.display === 'none') {
            notificationPopup.style.display = 'block';
        } else {
            notificationPopup.style.display = 'none';
        }
    }
</script>
