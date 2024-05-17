<?php

use App\Http\Controllers\Admin\HomeController;




Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
