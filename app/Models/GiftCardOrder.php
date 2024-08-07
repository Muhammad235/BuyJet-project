<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiftCardOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trx_hash',
        'status',
        'gift_card_id',
        'currency_id',
        'amount',
        'with_receipt',
        'is_physical_card',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function giftcard() : BelongsTo
    {
        return $this->belongsTo(GiftCard::class);
    }
}
