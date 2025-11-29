<?php

use App\Http\Requests\chartsHome;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("pages.home.main");
});

Route::get("/laravel", function () {
    return view("welcome");
});

Route::get('/daftar', function () {
    return view('pages.daftar.daftar'); 
});

Route::get("/charts", [chartsHome::class, "showCharts"]);

Route::get("/login", fn() => view("pages.auth.login"))->name("login");
Route::post("/login", [AuthController::class, "login"]);

Route::get("/register", fn() => view("pages.auth.register"))->name("register");
Route::post("/register", [AuthController::class, "register"]);

Route::get("/logout", [AuthController::class, "logout"]);

Route::group(['middleware' => ['auth', 'check_role:admin']], function () {
    Route::get('/admin', fn() => 'halaman admin');
});
Route::group(['middleware' => ['auth', 'check_role:user', 'check_status']], function () {
    Route::get('/user', fn() => 'halaman user');
});
Route::group(['middleware' => ['auth', 'check_role:user']], function () {
    Route::get('/verify', [VerificationController::class, 'showVerifyForm']);
    Route::post('/verify', [VerificationController::class, 'sendOtp']);
    Route::get('/verify/{unique_id}', [VerificationController::class, 'show']);
    Route::put('/verify/{unique_id}', [VerificationController::class, 'update']);
});
