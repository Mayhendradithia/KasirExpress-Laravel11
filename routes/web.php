<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', [LoginController::class, 'formlogin'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'formregister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::middleware(['auth'])->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('main.index'); 
        Route::resource('vendor', ProductController::class);
        
    
});
