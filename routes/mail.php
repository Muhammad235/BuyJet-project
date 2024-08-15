<?php
use App\Mail\SendOtpMail;
use App\Mail\BuyOrderMail;
use App\Mail\SellOrderMail;
use App\Mail\Admin\CryptoOrderMail;

Route::get('/otp-mail', function(){

    $mail  = new SendOtpMail('3456');
    echo $mail->render();
})->name('mail');

// Route::get('/buy-mail', function(){

//     $order = [
//         'reference' => '334Td4',
//         'firstname' => 'John',
//         'amount' => 1000,
//         'cryptoAmount' => 20,
//         'cryptocurrency' => 'BitCoin'
//     ];

//     $mail  = new BuyOrderMail($order, 1000);
//     echo $mail->render();
// })->name('mail');

// Route::get('/sell-mail', function(){

//     $order = [
//         'reference' => '334Td4',
//         'firstname' => 'John',
//         'amount' => 1000,
//         'cryptoAmount' => 20,
//         'cryptocurrency' => 'BitCoin'
//     ];

//     $mail  = new SellOrderMail($order);
//     echo $mail->render();
// })->name('mail');


Route::get('/order', function(){

    $order = [
        'reference' => '334Td4',
        'firstname' => 'John',
        'amount' => 1000,
        'cryptoAmount' => 20,
        'cryptocurrency' => 'BitCoin'
    ];

    $mail  = new CryptoOrderMail();
    echo $mail->render();
});
