<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\GeneralSettingsController;




// Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');

Route::prefix('admin')->group(function (){
    Route::get('/',[HomeController::class,'index'])->name('admin.home');

    Route::prefix('profile')->group(function (){ 
        Route::get('/', [HomeController::class, 'edit'])->name('admin.profile.edit');
        Route::patch('/password',[HomeController::class,'password'])->name('admin.profile.password');  
    });

    Route::prefix('manage')->group(function(){
        Route::get('/rates', [GeneralSettingsController::class, 'getRates'])->name('admin.manage.rates');
        Route::patch('/rates/{rate}', [GeneralSettingsController::class, 'updateRate'])->name('admin.manage.rates.update');

        Route::get('/banks', [ManageController::class, 'getBanks'])->name('admin.manage.banks');
        Route::patch('/banks/{bank}', [ManageController::class, 'updateBank'])->name('admin.manage.banks.update');

        // Route::get('/cryptos', [ManageController::class, 'getCryptos'])->name('admin.manage.cryptos');
        // Route::get('/cryptos/{id}', [ManageController::class, 'getCrypto'])->name('admin.manage.cryptos.show');
        // Route::post('/cryptos', [ManageController::class, 'createCrypto'])->name('admin.manage.cryptos.store');
        // Route::patch('/cryptos/{crypto}', [ManageController::class, 'updateCrypto'])->name('admin.manage.cryptos.update');


    });
});