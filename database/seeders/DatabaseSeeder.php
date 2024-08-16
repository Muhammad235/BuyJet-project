<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\Status;
use App\Models\Currency;
use App\Models\GiftCard;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cryptocurrency;
use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'firstname' => 'Bujet',
            'lastname' => 'Admin',
            'email' => 'support@buyjet.ng',
            'role' => Status::ADMIN,
            'phone_number' => '0000000001',
            'email_verified_at' => now(),
            'password' => Hash::make('buyjet')
        ]);

        User::create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'test@buyjet.ng',
            'role' => Status::USER,
            'phone_number' => '0000000002',
            'email_verified_at' => now(),
            'password' => Hash::make('test')
        ]);

        GeneralSetting::create([
            'account_name' => 'BuyJet LTD',
            'account_number' => '00000000',
            'bank_name' => 'Gt Bank',
            'buy_rate' => 1200,
            'sell_rate' => 1000,
        ]);

        $assets = '[{
            "assetname":"BEP 20","assetaddress":"0x74c06d0ae18523e35091f55983611910411d4b13"
            }]';

        Cryptocurrency::create([
            'name' => 'BITCOIN',
            'symbol' => 'upload/crypto/bitcoin.png',
            'assets' => $assets,
            'charge' => 0.5,
            'wallet_address' => '0x74c06d0ae18523e35091f55983611910411d4b13'
        ]);

        Cryptocurrency::create([
            'name' => 'DOGECOIN',
            'symbol' => 'upload/crypto/doge.png',
            'assets' => $assets,
            'charge' => 0.5,
            'wallet_address' => '0x74c06d0ae18523e35091f55983611910411d4b13'
        ]);

        Cryptocurrency::create([
            'name' => 'ETHEREUM',
            'symbol' => 'upload/crypto/ethereum.png',
            'assets' => $assets,
            'charge' => 0.5,
            'wallet_address' => '0x74c06d0ae18523e35091f55983611910411d4b13'
        ]);

        GiftCard::create([
            'name' => 'Amazon',
            'symbol' => 'sybmol',
        ]);

        GiftCard::create([
            'name' => 'steam',
            'symbol' => 'sybmol',
        ]);

        Currency::create([
            'name' => 'CAD',
            'symbol' => 'sybmol',
        ]);

        Currency::create([
            'name' => 'USD',
            'symbol' => 'sybmol',
        ]);
    }
}
