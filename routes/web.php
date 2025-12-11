<?php

use Illuminate\Support\Facades\Route;
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
