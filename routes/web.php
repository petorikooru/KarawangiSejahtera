<?php

use App\Http\Requests\chartsHome;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;

Route::get("/", function () {
    return view("pages.home.main");
});

Route::get("/laravel", function () {
    return view("welcome");
});

Route::get("/daftar", function () {
    return view("pages.daftar.daftar");
});

route::get("/daftar2", function () {
    return view("pages.daftar.daftar2");
});

route::get("/login", function () {
    return view("pages.login.login");
});

Route::get("/user/home", [UserController::class, 'ShowAll']);


route::get("user/pengaturan", function () {
    return view("pages.user.pengaturan");
});

route::get("user/notifikasi",   [NotificationController::class, 'showNotifications']);

route::get("user/pelatihan", function () {
    return view("pages.user.pelatihan");
});

route::get("user/desa-bersuara", function () {
    return view("pages.user.desa-bersuara");
});

route::get("user/umkm", function () {
    return view("pages.user.umkm");
});

Route::get("/charts", [chartsHome::class, "showCharts"]);



// Backend stuff (i do NOT understand any at all lmao -demetori0)

// Route::get("/login", fn() => view("pages.auth.login"))->name("login");
// Route::post("/login", [AuthController::class, "login"]);

Route::get("/register", fn() => view("pages.auth.register"))->name("register");
Route::post("/register", [AuthController::class, "register"]);

Route::get("/logout", [AuthController::class, "logout"]);

Route::group(["middleware" => ["auth", "check_role:admin"]], function () {
    Route::get("/admin", fn() => "halaman admin");
});
Route::group(
    ["middleware" => ["auth", "check_role:user", "check_status"]],
    function () {
        Route::get("/user", fn() => "halaman user");
    },
);
Route::group(["middleware" => ["auth", "check_role:user"]], function () {
    Route::get("/verify", [VerificationController::class, "showVerifyForm"]);
    Route::post("/verify", [VerificationController::class, "sendOtp"]);
    Route::get("/verify/{unique_id}", [VerificationController::class, "show"]);
    Route::put("/verify/{unique_id}", [
        VerificationController::class,
        "update",
    ]);
});
