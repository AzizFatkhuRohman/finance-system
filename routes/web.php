<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('dashboard', function () {
    return view('admin.dashboard');
});

// Customer
Route::get('customer', function () {
    return view('admin.data_customer');
});

//Suplier
Route::get('suplier', function () {
    return view('admin.data_suplier');
});

//Produk
Route::get('produk', function () {
    return view('admin.data_produk');
});

//Penjualan
Route::get('penjualan', function () {
    return view('admin.penjualan');
});

//Biaya
Route::get('biaya', function () {
    return view('admin.biaya');
});