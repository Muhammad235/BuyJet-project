<?php

use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\BuyCryptoController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\SellCryptoController;
use App\Http\Controllers\User\SellGiftCardController;


Route::get('/optimize-clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize');

    return 'Application optimized and cache cleared successfully';
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('buy')->group(function() {
        Route::get('/', [BuyCryptoController::class, 'create'])->name('buy.create');
        Route::post('/crypto', [BuyCryptoController::class, 'store'])->name('buy.store');
        Route::get('/{trx_hash}/confirm', [BuyCryptoController::class, 'confirm'])->name('buy.confirm');
        Route::put('/confirm/{trx_hash}', [BuyCryptoController::class, 'update'])->name('buy.update');
        // Route::get('/{id}',[BuyCryptoController::class, 'show'])->name('buy.show');
    });

    Route::prefix('sell')->group(function() {
        Route::get('/', [SellCryptoController::class, 'create'])->name('sell.create');
        Route::post('/crypto', [SellCryptoController::class, 'store'])->name('sell.store');
        Route::get('/{trx_hash}/confirm', [SellCryptoController::class, 'confirm'])->name('sell.confirm');
        Route::put('/confirm/{trx_hash}', [SellCryptoController::class, 'update'])->name('sell.update');
        // Route::get('/{id}',[BuyCryptoController::class, 'show'])->name('buy.show');
    });

    Route::prefix('giftcard')->group(function() {
        Route::get('/',[SellGiftCardController::class, 'create'])->name('giftcard.create');
        Route::post('/giftcard',[SellGiftCardController::class, 'store'])->name('giftcard.store');
        // Route::get('/{trx_hash}/confirm',[SellCryptoController::class, 'confirm'])->name('sell.confirm');
        // Route::put('/confirm/{trx_hash}',[SellCryptoController::class, 'update'])->name('sell.update');
    });

    Route::prefix('settings')->group(function() {
        Route::patch('/', [SettingsController::class, 'update'])->name('settings.update');
        Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('/bank-info', [SettingsController::class, 'bankInfo'])->name('settings.bank_info');
        Route::get('/change-password', [NewPasswordController::class, 'create'])->name('settings.change_password');
    });


    Route::get('/transactions', [DashboardController::class, 'allTransactions'])->name('transactions.all');
    Route::resource('/tickets', TicketController::class);
});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/mail.php';


