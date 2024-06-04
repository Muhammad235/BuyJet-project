<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\GiftcardController;
use App\Http\Controllers\Admin\CryptocurrencyController;
use App\Http\Controllers\Admin\GeneralSettingsController;


Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::prefix('profile')->group(function (){ 
        Route::get('/', [HomeController::class, 'edit'])->name('profile.edit');
        Route::patch('/password',[HomeController::class,'password'])->name('profile.password');  
    });

    Route::prefix('manage')->name('manage.')->group(function(){
        Route::get('/rates', [GeneralSettingsController::class, 'getRates'])->name('rates');
        Route::patch('/rates/{rate}', [GeneralSettingsController::class, 'updateRate'])->name('rates.update');

        Route::get('/banks', [ManageController::class, 'getBanks'])->name('banks');
        Route::patch('/banks/{bank}', [ManageController::class, 'updateBank'])->name('banks.update');
        Route::resource('/crypto', CryptocurrencyController::class);

        Route::resource('/giftcard', GiftcardController::class);
    });

    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::patch('/{user}', [UserController::class, 'update'])->name('users.update');
    });

    Route::prefix('tickets')->group(function(){
        Route::get('/', [TicketController::class, 'index'])->name('tickets.index');
        Route::get('/{id}', [TicketController::class, 'show'])->name('tickets.show'); 
        Route::patch('/confirm/{id}',[TicketController::class,'update'])->name('tickets.update');
    });
});