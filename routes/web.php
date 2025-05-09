<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPembayaranController;
use App\Http\Controllers\AdminKonsultasiController;
use App\Http\Controllers\AdminKRSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaMahasiswaController;
use App\Http\Controllers\AdminKHSController;
use App\Http\Controllers\OrangTuaMahasiswaController;
use App\Http\Controllers\OrangTuaController;
/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
*/

// Route Halaman Utama
Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('app/index', [ApplicationController::class, 'index'])->middleware('auth')->name('app.index');
// Rute untuk melihat dan mengubah profil
Route::get('profile', [ApplicationController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::post('profile', [ApplicationController::class, 'updateProfile'])->middleware('auth');
Route::get('/krs', [ApplicationController::class, 'showKRS'])->name('krs');
Route::post('krs', [ApplicationController::class, 'submitKRS'])->middleware('auth');
Route::post('/krs', [ApplicationController::class, 'submitKRS'])->name('krs.submit');
Route::delete('/krs/{id}', [ApplicationController::class, 'destroyKRS'])->name('krs.destroy');

Route::get('khs', [ApplicationController::class, 'showKHS'])->middleware('auth')->name('khs');
Route::post('khs', [ApplicationController::class, 'submitKHS'])->middleware('auth');
Route::post('/khs/submit', [ApplicationController::class, 'submitKHS'])->name('khs.submit');
Route::post('/khs/update', [ApplicationController::class, 'updateKHS'])->name('khs.update');


Route::prefix('orangtua')->group(function () {
    Route::get('/login', [OrangTuaController::class, 'showLoginForm'])->name('orangtua.login');
    Route::post('/login', [OrangTuaController::class, 'login'])->name('orangtua.login.post');
    Route::get('/notifikasi', [OrangTuaController::class, 'notif'])->name('orangtua.notifikasi');
    Route::get('/register', [OrangTuaController::class, 'showRegistrationForm'])->name('orangtua.register'); // Rute untuk tampilan registrasi
    Route::post('/register', [OrangTuaController::class, 'register'])->name('orangtua.register.post'); // Rute untuk memproses registrasi
    Route::get('/orangtua/dashboard', function () {
        return view('orangtua.app.dashboard');
    })->name('orangtua.app.dashboard');

    Route::get('/orangtua/khs', [OrangTuaController::class, 'khs'])->name('orangtua.app.khs');

    // Rute untuk KRS
    Route::get('/orangtua/krs', [OrangTuaController::class, 'krs'])->name('orangtua.krs');

    // Rute untuk profil
    Route::get('/orangtua/profile', [OrangTuaController::class, 'profile'])->name('orangtua.app.profile');

    Route::get('/orangtua/logout', [OrangTuaController::class, 'logout'])->name('orangtua.logout');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/orangtua/profile', [OrangTuaController::class, 'profile'])->name('orangtua.app.profile');
});
// Routes untuk Admin
Route::prefix('admin')->group(function () {

    // Route untuk Login Admin
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Route yang dilindungi oleh middleware admin.auth
    Route::middleware(['admin.auth'])->group(function () {

        Route::get('/admin/pembayaran', [AdminPembayaranController::class, 'index'])->name('admin.pembayaran.index');
        Route::post('/admin/pembayaran/konfirmasi/{id}', [AdminPembayaranController::class, 'konfirmasi'])->name('admin.pembayaran.konfirmasi');
        Route::get('/admin/pembayaran/{id}', [AdminPembayaranController::class, 'show'])->name('admin.pembayaran.show');
        Route::resource('admin/pembayaran', AdminPembayaranController::class);
        Route::resource('pembayaran', AdminPembayaranController::class)->names([
            'create' => 'admin.pembayaran.create',
            'index' => 'admin.pembayaran.index',
            'store' => 'admin.pembayaran.store',
            'edit' => 'admin.pembayaran.edit',
            'destroy' => 'admin.pembayaran.destroy',
            'update' => 'admin.pembayaran.update',
            'show' => 'admin.pembayaran.show'
        ]);

        // Routes Kelola Data
        Route::prefix('/kelola')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.kelola');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('admin.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.destroy');
        });

        // Routes untuk Orang Tua Mahasiswa
        Route::prefix('/orangtua')->group(function () {
            Route::get('/', [OrangTuaMahasiswaController::class, 'index'])->name('admin.orangtua.index');
            Route::get('/create', [OrangTuaMahasiswaController::class, 'create'])->name('admin.orangtua.create');
            Route::post('/', [OrangTuaMahasiswaController::class, 'store'])->name('admin.orangtua.store');
            Route::get('/{id}/edit', [OrangTuaMahasiswaController::class, 'edit'])->name('admin.orangtua.edit');
            Route::put('/{id}', [OrangTuaMahasiswaController::class, 'update'])->name('admin.orangtua.update');
            Route::delete('/{id}', [OrangTuaMahasiswaController::class, 'destroy'])->name('admin.orangtua.destroy');
        });



        // Routes Pembayaran Admin
        Route::prefix('/pembayaran')->group(function () {
            Route::get('/', [AdminPembayaranController::class, 'index'])->name('admin.pembayaran.index');
            Route::post('/konfirmasi/{id}', [AdminPembayaranController::class, 'konfirmasi'])->name('admin.pembayaran.konfirmasi');
        });

        // Routes Konsultasi Admin
        Route::prefix('/konsultasi')->group(function () {
            Route::get('/', [AdminKonsultasiController::class, 'index'])->name('admin.konsultasi.index');
            Route::delete('/hapus/{id}', [AdminKonsultasiController::class, 'destroy'])->name('admin.konsultasi.hapus');
        });
        Route::prefix('/dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');

        });

        Route::prefix('khs')->group(function () {
            Route::get('/', [AdminKHSController::class, 'index'])->name('admin.khs.index');
            Route::get('/create', [AdminKHSController::class, 'create'])->name('admin.khs.create');
            Route::post('/', [AdminKHSController::class, 'store'])->name('admin.khs.store');
            Route::get('/{id}/edit', [AdminKHSController::class, 'edit'])->name('admin.khs.edit');
            Route::put('/khs/{id}', [AdminKHSController::class, 'update'])->name('admin.khs.update');

            Route::delete('/{id}', [AdminKHSController::class, 'destroy'])->name('admin.khs.destroy');
        });

        Route::prefix('/krs')->group(function () {
            Route::get('/', [AdminKRSController::class, 'index'])->name('admin.krs.index');
            Route::get('/create', [AdminKRSController::class, 'create'])->name('admin.krs.create');
            Route::post('/', [AdminKRSController::class, 'store'])->name('admin.krs.store');
            Route::get('/{id}/edit', [AdminKRSController::class, 'edit'])->name('admin.krs.edit');
            Route::put('/{krs}', [AdminKRSController::class, 'update'])->name('admin.krs.update');
            Route::delete('/{krs}', [AdminKRSController::class, 'destroy'])->name('admin.krs.destroy');
        });
    });

    Route::prefix('/mahasiswa')->group(function () {
        Route::get('/', [KelolaMahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
        Route::get('/create', [KelolaMahasiswaController::class, 'create'])->name('admin.mahasiswa.create');
        Route::post('/', [KelolaMahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
        Route::get('/{id}/edit', [KelolaMahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
        Route::put('/{id}', [KelolaMahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
        Route::delete('/{id}', [KelolaMahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
    });
    Route::prefix('admin/matkul')->group(function () {
        Route::get('/', [MatkulController::class, 'index'])->name('admin.matkul.index');
        Route::get('/create', [MatkulController::class, 'create'])->name('admin.matkul.create');
        Route::post('/', [MatkulController::class, 'store'])->name('admin.matkul.store');
        Route::get('/{id}', [MatkulController::class, 'show'])->name('admin.matkul.show');
        Route::get('/{id}/edit', [MatkulController::class, 'edit'])->name('admin.matkul.edit');
        Route::put('/{id}', [MatkulController::class, 'update'])->name('admin.matkul.update');
        Route::delete('/{id}', [MatkulController::class, 'destroy'])->name('admin.matkul.destroy');


    });
});