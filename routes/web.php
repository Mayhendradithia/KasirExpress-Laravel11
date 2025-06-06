<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\vendor\PosController;

Route::get('/', [LoginController::class, 'formlogin'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'formregister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::middleware(['auth'])->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('main.index');
    Route::resource('vendor', ProductController::class);
    
    Route::prefix('index/orders')->group(function () {
        Route::get('/', [PosController::class, 'create'])->name('orders.index');
        Route::post('/', [PosController::class, 'store'])->name('orders.store');
        Route::get('/edit/{id}', [PosController::class, 'edit'])->name('orders.edit');
        Route::post('/update/{id}', [PosController::class, 'update'])->name('orders.update');
        Route::delete('/delete/{id}', [PosController::class, 'destroy'])->name('orders.destroy');
    });
});
