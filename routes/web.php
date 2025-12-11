<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\AuthController;           // ← add this if not already
use App\Http\Controllers\VerificationController; // ← add if not already
use App\Http\Requests\chartsHome;

// ============================================
// Public Routes
// ============================================
Route::view('/', 'pages.home.main');
Route::view('/laravel', 'welcome');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/charts', [chartsHome::class, 'showCharts']);

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// For completeness, add the others if not already there
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/daftar2', function () {
    return view('pages.auth.register-step1');
})->name('register.step1');

Route::post('/daftar2', [AuthController::class, 'registerStep1']);

Route::get('/daftar', function () {
    if (!session('register_data')) {
        return redirect()->route('register.step1');
    }
    return view('pages.auth.register-step2');
})->name('register.step2');

Route::post('/daftar', [AuthController::class, 'registerStore'])->name('register.store');

// ============================================
// Authenticated + Role: User
// ============================================

    // Dashboard & Main Pages
    Route::get('user/home', [UserController::class, 'main'])->name('home');
        Route::get('user/pengaturan', [UserController::class, 'pengaturan'])->name('pengaturan');
        Route::get('/notifikasi', [UserController::class, 'notifikasi'])->name('notifikasi');

    // Static pages (you can move them to controller later if you want)
    Route::view('user/pelatihan', 'pages.user.pelatihan')->name('pelatihan');
    Route::view('user/desa-bersuara', 'pages.user.desa-bersuara')->name('desa-bersuara');
    Route::view('user/umkm', 'pages.user.umkm')->name('umkm');

    // Pelatihan (real controller)
        Route::get('user/pelatihan', [PelatihanController::class, 'index']);
// Route::prefix('user')->name('user.')->group(function () {

//     // Dashboard & Main Pages
//     Route::get('/home', [UserController::class, 'main'])->name('home');
//     Route::get('/pengaturan', [UserController::class, 'pengaturan'])->name('pengaturan');
//     Route::get('/notifikasi', [UserController::class, 'notifikasi'])->name('notifikasi');

//     // Static pages (you can move them to controller later if you want)
//     Route::view('/pelatihan', 'pages.user.pelatihan')->name('pelatihan');
//     Route::view('/desa-bersuara', 'pages.user.desa-bersuara')->name('desa-bersuara');
//     Route::view('/umkm', 'pages.user.umkm')->name('umkm');

//     // Pelatihan (real controller)
//         Route::get('/pelatihan', [PelatihanController::class, 'index'])
//             ->name('pelatihan.index');

//     Route::post('/pelatihan/{pelatihan}/register', [PelatihanController::class, 'register'])
//          ->name('pelatihan.register');
// });

// ============================================
// Verification Routes (still public but require auth)
// ============================================
Route::middleware('auth')->group(function () {
    Route::get('/verify', [VerificationController::class, 'showVerifyForm'])->name('verify.form');
    Route::post('/verify', [VerificationController::class, 'sendOtp'])->name('verify.send');
    Route::get('/verify/{unique_id}', [VerificationController::class, 'show'])->name('verify.show');
    Route::put('/verify/{unique_id}', [VerificationController::class, 'update'])->name('verify.update');
});

// ============================================
// Admin Routes
// ============================================
Route::middleware(['auth', 'check_role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => 'Halaman Admin')->name('dashboard');
    // tambahkan route admin lain di sini nanti
});