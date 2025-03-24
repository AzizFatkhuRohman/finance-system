<?php

use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('akun', ChartOfAccountController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('suplier', SupplierController::class);
    Route::resource('produk', ProductController::class);

    //Region
    Route::get('/cities', [RegionController::class, 'getCities']);
    Route::get('/districts', [RegionController::class, 'getDistricts']);
    Route::get('/villages', [RegionController::class, 'getVillages']);
});

require __DIR__ . '/auth.php';
//Penjualan
Route::get('penjualan', function () {
    return view('admin.penjualan');
});

//Biaya
Route::get('biaya', function () {
    return view('admin.biaya');
});

//Jurnal
Route::get('jurnal', function () {
    return view('admin.jurnal');
});

//Neraca
Route::get('neraca', function () {
    return view('admin.neraca');
});

//Buku Besar
Route::get('buku_besar', function () {
    return view('admin.buku_besar');
});

//Rugi Laba
Route::get('rl', function () {
    return view('admin.rl');
});

//Akun
