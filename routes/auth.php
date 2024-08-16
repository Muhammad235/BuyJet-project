<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordOtpController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
                ->name('login.authenticate');

    Route::get('forget-password', [PasswordOtpController::class, 'create'])
                ->name('forget.password');

    Route::post('forget-password', [PasswordOtpController::class, 'store']);

    Route::put('reset-password', [ResetPasswordController::class, 'update'])
                ->name('reset.password');

    Route::post('verify-otp', OtpController::class)
                ->name('verify.otp');

});

// Route::get('otp', [OtpController::class, 'index']);


Route::middleware('auth')->group(function () {

    Route::put('change-password', [NewPasswordController::class, 'update'])
                ->name('password.update');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    //             ->name('logout');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
