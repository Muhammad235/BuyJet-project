<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'wallet_address',
        // 'buy_rate',
        'charge',
        // 'sell_rate',
        'assets',
        'status',
    ];

}
