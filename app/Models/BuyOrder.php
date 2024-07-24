<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BuyOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trx_hash',
        'status',
        'cryptocurrency_id',
        'amount',
        'payment_address',
        'asset_network',
        'payment_receipt',
        'wallet_address',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cryptocurrency() : BelongsTo
    {
        return $this->belongsTo(Cryptocurrency::class);
    }
}
