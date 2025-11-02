<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.main');
});

Route::get('/laravel', function () {
    return view('welcome');
});
