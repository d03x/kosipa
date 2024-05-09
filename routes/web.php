<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest')->group(function (){
    Route::get('/login', [\App\Http\Controllers\LoginController::class,'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\LoginController::class,'doLogin'])->name('login');
});

Route::middleware('auth')->group(function(){
    Route::get('/',[\App\Http\Controllers\Anggota\DashboardController::class,'index'])->name('dashboard');
    Route::prefix('anggota')->name('anggota.')->group(function(){
        Route::get('/simpanan',[\App\Http\Controllers\Anggota\SimpananController::class,'index'])->name('simpanan');
        Route::post('/simpanan',[\App\Http\Controllers\Anggota\SimpananController::class,'store'])->name('simpanan.store');
        //route untuk pinjaman
        Route::get('/pinjaman',[\App\Http\Controllers\Anggota\PinjamanController::class,'index'])->name('pinjaman');
    });

    Route::prefix('admin')->name('admin.')->middleware(\App\Http\Middleware\AdminMiddleware::class)->prefix('admin')->group(function(){
        Route::get('dashboard',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('dashboard');
        Route::get('simpanan',[\App\Http\Controllers\Admin\SimpananController::class,'index'])->name('simpanan');
        Route::patch('simpanan/{simpanan}/confirm',[\App\Http\Controllers\Admin\SimpananController::class,'confirm'])->name('simpanan.confirm');
    });
});
