<?php

use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Customer
Route::get('customer', function (){
    return view('admin.data_customer');
});

//Suplier
Route::get('suplier', function(){
    return view('admin.data_suplier');
});

//Produk
Route::get('produk', function(){
    return view('admin.data_produk');
});

//Penjualan
Route::get('penjualan', function(){
    return view('admin.penjualan');
});

//Biaya
Route::get('biaya', function(){
    return view('admin.biaya');
});

//Jurnal
Route::get('jurnal', function(){
    return view('admin.jurnal');
});

//Akun
Route::get('akun', function(){
    return view('admin.data_akun');
});