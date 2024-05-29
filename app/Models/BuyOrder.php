<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trx_hash',
        'cryptocurrency_id',
        'amount',
        'payment_address',
        'asset_network',
        'payment_receipt',
        'note',
        'status',
        'payment_status',
    ];
}
