<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\BuyCryptoController;
use App\Http\Controllers\User\DashboardController;



Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('buy')->group(function() {
        Route::get('/',[BuyCryptoController::class, 'create'])->name('buy.create');
        Route::post('/crypto',[BuyCryptoController::class, 'store'])->name('buy.store');
        Route::get('/{transaction}/confirm',[BuyCryptoController::class, 'confirm'])->name('buy.confirm');
        Route::put('/confirm/{id}',[BuyCryptoController::class, 'update'])->name('buy.update');
        // Route::get('/{id}',[BuyCryptoController::class, 'show'])->name('buy.show');
    });
});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
