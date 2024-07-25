<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Galeri');
});

Route::get('/', [App\Http\Controllers\Front\CarController::class,'index'])->name('front.index');

Route::get('/brand', [App\Http\Controllers\Front\BrandController::class,'index'])->name('front.brand.index');

Route::get('/brand/create', [App\Http\Controllers\Admin\BrandController::class,'create'])->name('admin.brand.create');

Route::post('/brand/store', [App\Http\Controllers\Admin\BrandController::class,'store'])->name('admin.brand.store');

Route::get('/car/create', [App\Http\Controllers\Admin\CarController::class,'create'])->name('admin.car.create');

Route::post('/car/store', [App\Http\Controllers\Admin\CarController::class,'store'])->name('admin.car.store');

Route::get('/car/show/{slug}', [App\Http\Controllers\Front\CarController::class,'show'])->name('front.car.show');

