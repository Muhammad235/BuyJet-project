<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\BuyCryptoController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\SellCryptoController;
use App\Http\Controllers\User\SellGiftCardController;



Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('buy')->group(function() {
        Route::get('/',[BuyCryptoController::class, 'create'])->name('buy.create');
        Route::post('/crypto',[BuyCryptoController::class, 'store'])->name('buy.store');
        Route::get('/{trx_hash}/confirm',[BuyCryptoController::class, 'confirm'])->name('buy.confirm');
        Route::put('/confirm/{trx_hash}',[BuyCryptoController::class, 'update'])->name('buy.update');
        // Route::get('/{id}',[BuyCryptoController::class, 'show'])->name('buy.show');
    });

    Route::prefix('sell')->group(function() {
        Route::get('/',[SellCryptoController::class, 'create'])->name('sell.create');
        Route::post('/crypto',[SellCryptoController::class, 'store'])->name('sell.store');
        Route::get('/{trx_hash}/confirm',[SellCryptoController::class, 'confirm'])->name('sell.confirm');
        Route::put('/confirm/{trx_hash}',[SellCryptoController::class, 'update'])->name('sell.update');
        // Route::get('/{id}',[BuyCryptoController::class, 'show'])->name('buy.show');
    });

    Route::prefix('giftcard')->group(function() {
        Route::get('/',[SellGiftCardController::class, 'index'])->name('sell.index');
        // Route::post('/crypto',[SellCryptoController::class, 'store'])->name('sell.store');
        // Route::get('/{trx_hash}/confirm',[SellCryptoController::class, 'confirm'])->name('sell.confirm');
        // Route::put('/confirm/{trx_hash}',[SellCryptoController::class, 'update'])->name('sell.update');
    });

    Route::prefix('tickets')->group(function() {
        Route::get('/',[TicketController::class,'index'])->name('ticket.index');
        Route::get('/create',[TicketController::class,'create'])->name('ticket.create');
        Route::post('/',[TicketController::class,'store'])->name('ticket.store');
        Route::get('/{transaction}/confirm',[TicketController::class,'confirm'])->name('ticket.confirm');
        Route::patch('/confirm/{id}',[TicketController::class,'update'])->name('ticket.update');
        Route::get('/{id}',[TicketController::class,'show'])->name('ticket.show');
    });
});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
