<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', function () {
    return view('Galeri');
});

Route::get('/', [App\Http\Controllers\Front\CarController::class,'index'])->name('front.index');

Route::get('/brand', [App\Http\Controllers\Front\BrandController::class,'index'])->name('front.brand.index');

Route::get('/brand/show/{id}', [App\Http\Controllers\Front\BrandController::class,'show'])->name('front.brand.show');

Route::get('/brand/create', [App\Http\Controllers\Admin\BrandController::class,'create'])->name('admin.brand.create')->middleware(AuthMiddleware::class);

Route::post('/brand/store', [App\Http\Controllers\Admin\BrandController::class,'store'])->name('admin.brand.store')->middleware(AuthMiddleware::class);

Route::delete('/brand/delete/{id}', [App\Http\Controllers\Admin\BrandController::class,'destroy'])->name('admin.brand.delete')->middleware(AuthMiddleware::class);

Route::get('/car/create', [App\Http\Controllers\Admin\CarController::class,'create'])->name('admin.car.create')->middleware(AuthMiddleware::class);

Route::post('/car/store', [App\Http\Controllers\Admin\CarController::class,'store'])->name('admin.car.store')->middleware(AuthMiddleware::class);

Route::get('/car/show/{slug}', [App\Http\Controllers\Front\CarController::class,'show'])->name('front.car.show');

Route::delete('/car/delete/{slug}', [App\Http\Controllers\Admin\CarController::class,'destroy'])->name('admin.car.delete')->middleware(AuthMiddleware::class);

Route::get('/car/edit/{slug}', [App\Http\Controllers\Admin\CarController::class,'edit'])->name('admin.car.edit')->middleware(AuthMiddleware::class);

Route::get('/brand/edit/{id}', [App\Http\Controllers\Admin\BrandController::class,'edit'])->name('admin.brand.edit')->middleware(AuthMiddleware::class);

Route::put('/car/update/{slug}', [App\Http\Controllers\Admin\CarController::class, 'update'])->name('admin.car.update')->middleware(AuthMiddleware::class);

Route::put('/brand/update/{id}', [App\Http\Controllers\Admin\BrandController::class,'update'])->name('admin.brand.update')->middleware(AuthMiddleware::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/car/list', [App\Http\Controllers\HomeController::class,'carlist'])->name('auth.car.list');

Route::get('/brand/list', [App\Http\Controllers\HomeController::class,'brandlist'])->name('auth.brand.list');
