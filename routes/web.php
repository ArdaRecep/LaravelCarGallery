<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Galeri');
});

Route::get('/', [App\Http\Controllers\Front\CarController::class,'index'])->name('front.index');

Route::get('/brand/create', [App\Http\Controllers\Admin\BrandController::class,'create'])->name('admin.brand.create');

Route::post('/brand/store', [App\Http\Controllers\Admin\BrandController::class,'store'])->name('admin.brand.store');

Route::get('/car/show/{car}', [App\Http\Controllers\Front\CarController::class,'show'])->name('front.car.show');

