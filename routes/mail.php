<?php
use App\Mail\BuyOrderMail;
use App\Mail\SendOtpMail;

Route::get('/otp-mail', function(){

    $mail  = new SendOtpMail('3456');
    echo $mail->render();
})->name('mail');

Route::get('/buy-mail', function(){

    $order = [
        'firstname' => 'John',
        'amoumt' => 1000,
    ];

    $mail  = new BuyOrderMail($order);
    echo $mail->render();
})->name('mail');