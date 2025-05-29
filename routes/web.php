<?php

use App\Http\Controllers\BiayaController;
use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DetailProdukPenjualanController;
use App\Http\Controllers\FileBiayaController;
use App\Http\Controllers\FilePenjualanController;
use App\Http\Controllers\PenjualanController;
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
    Route::resource('penjualan',PenjualanController::class);
    Route::resource('file-penjualan',FilePenjualanController::class);
    Route::resource('file-biaya', FileBiayaController::class);
    Route::put('biaya-receipt/{id}', [BiayaController::class,'biaya_receipt']);
    Route::resource('detail-produk-penjualan',DetailProdukPenjualanController::class);
    Route::put('penjualan/pengiriman/{id}',[PenjualanController::class,'pengirimanSubmit']);
    Route::put('penjualan/pengiriman/delete/{id}',[PenjualanController::class,'pengirimanDelete']);
    Route::put('penjualan/faktur/{id}',[PenjualanController::class,'fakturSubmit']);
    Route::put('penjualan/faktur/delete/{id}',[PenjualanController::class,'fakturDelete']);
    Route::resource('biaya',BiayaController::class);
    Route::get('penjualan/quotation/{id}', [PenjualanController::class, 'quotation']);
    Route::get('araging',[CustomerController::class, 'araging']);
    Route::get('penjualan/spk/{id}',[PenjualanController::class,'spk']);
    Route::get('penjualan/pengiriman/{id}',[PenjualanController::class,'pengiriman']);
    Route::get('penjualan/faktur/{id}',[PenjualanController::class,'faktur']);
    Route::get('pembayaran',[BiayaController::class, 'pembayaran']);
    Route::get('penjualan/surat_jalan/{id}',[PenjualanController::class,'surat_jalan']);
    Route::get('penjualan/invoice/{id}',[PenjualanController::class,'invoice']);

    //Region
    Route::get('/cities', [RegionController::class, 'getCities']);
    Route::get('/districts', [RegionController::class, 'getDistricts']);
    Route::get('/villages', [RegionController::class, 'getVillages']);
    Route::get('/customer/{id}/alamat', [CustomerController::class, 'getAlamat'])->name('customer.alamat');
    Route::get('supplier/{id}/alamat',[SupplierController::class,'alamatApi']);
    Route::get('/produk/{id}/harga', [ProductController::class, 'getProductDetails'])->name('produk.details');
});

require __DIR__ . '/auth.php';

//Biaya
// Route::get('biaya', function () {
//     return view('admin.biaya');
// });

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

//Quotation
Route::get('quotation', function () {
    return view('admin.quotation');
});