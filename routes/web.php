<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::middleware(['auth','access:admin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('dashboard',[CustomerController::class,'index']);
    });
});

Auth::routes([
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
