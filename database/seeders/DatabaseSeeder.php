<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        GeneralSetting::factory()->create([
            'account_name' => 'Admin',
            'account_number' => '00000000',
            'bank_name' => 'Gt Bank',
            'buy_rate' => 1200,
            'sell_rate' => 1000,
        ]);
    }
}
