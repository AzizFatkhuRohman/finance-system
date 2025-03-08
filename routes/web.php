<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('dashboard', function () {
    return view('admin/dashboard');
});
