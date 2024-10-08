<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_name',
        'account_number',
        'bank_name',
        'buy_rate',
        'sell_rate',
        'with_receipt_charge',
        'with_no_receipt_charge',
        'physical_card_charge',
        'e_code_card_charge',
    ];

}
