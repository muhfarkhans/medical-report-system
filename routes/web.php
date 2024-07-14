<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'authenticate'])->name('login.authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class,'index'])->name('index');
        Route::get('/create', [UserController::class,'create'])->name('create');
        Route::post('/store', [UserController::class,'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class,'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class,'delete'])->name('delete');
    });
});
