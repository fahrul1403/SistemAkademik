<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Link Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-800 text-white p-5">
            <h2 class="text-3xl font-bold mb-8">Admin Dashboard</h2>
            <ul>
                <li class="mb-6">
                    <a href="{{ route('admin.dashboard.index') }}" class="flex items-center text-lg hover:bg-gray-700 p-2 rounded transition duration-150">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                </li>
                <li class="mb-6">
                    <a href="{{ route('admin.mahasiswa.index') }}" class="flex items-center text-lg hover:bg-gray-700 p-2 rounded transition duration-150" title="Kelola Data Mahasiswa">
                        <i class="fas fa-user-graduate mr-2"></i> Kelola Mahasiswa
                    </a>
                </li>
                
                <li class="mb-6">
                    <a href="{{ route('admin.orangtua.index') }}" class="flex items-center text-lg hover:bg-gray-700 p-2 rounded transition duration-150" title="Kelola Data Orang Tua">
                        <i class="fas fa-users mr-2"></i> Kelola Orang Tua
                    </a>
                </li>

                <li class="mb-6">
                    <a href="{{ route('admin.khs.index') }}" class="flex items-center text-lg hover:bg-gray-700 p-2 rounded transition duration-150">
                        <i class="fas fa-book mr-2"></i> Kelola KHS
                    </a>
                </li>
                <li class="mb-6">
                    <a href="{{ route('admin.krs.index') }}" class="flex items-center text-lg hover:bg-gray-700 p-2 rounded transition duration-150">
                        <i class="fas fa-book-open mr-2"></i> Kelola KRS
                    </a>
                </li>
                <li class="mb-6">
                    <a href="{{ route('admin.pembayaran.index') }}" class="flex items-center text-lg hover:bg-gray-700 p-2 rounded transition duration-150">
                        <i class="fas fa-credit-card mr-2"></i> Kelola Pembayaran
                    </a>
                </li>
                <li class="mb-6">
                    <a href="{{ route('admin.matkul.index') }}" class="flex items-center text-lg hover:bg-gray-700 p-2 rounded transition duration-150">
                        <i class="fas fa-graduation-cap mr-2"></i> Kelola Mata Kuliah
                    </a>
                </li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center text-lg hover:bg-gray-700 p-2 rounded transition duration-150">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
