<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SellOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trx_hash',
        'cryptocurrency_id',
        'amount',
        'asset_network',
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
