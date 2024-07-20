<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'authenticate'])->name('login.authenticate');
Route::get('/queue', [PublicController::class,'queue'])->name('queue');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class,'index'])->name('index');
        Route::get('/queue', [DashboardController::class,'queue'])->name('queue');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class,'index'])->name('index');
        Route::get('/create', [UserController::class,'create'])->name('create');
        Route::post('/store', [UserController::class,'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class,'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class,'delete'])->name('delete');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class,'index'])->name('index');
        Route::get('/create', [AdminController::class,'create'])->name('create');
        Route::post('/store', [AdminController::class,'store'])->name('store');
        Route::get('/edit/{id}', [AdminController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [AdminController::class,'update'])->name('update');
        Route::get('/delete/{id}', [AdminController::class,'delete'])->name('delete');
    });

    Route::prefix('report')->name('report.')->group(function () {
        Route::get('/', [ReportController::class,'index'])->name('index');
        Route::get('/create', [ReportController::class,'create'])->name('create');
        Route::post('/store', [ReportController::class,'store'])->name('store');
        Route::get('/edit/{id}', [ReportController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [ReportController::class,'update'])->name('update');
        Route::get('/delete/{id}', [ReportController::class,'delete'])->name('delete');
    });
});
