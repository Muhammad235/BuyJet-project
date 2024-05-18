<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBank extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'buy_rate',
        'sell_rate',
    ];

}
