<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GiftCardOrder;
use Illuminate\Http\Request;

class GiftCardOrderController extends Controller
{
    public function show($trx_hash)
    {
        $transaction = GiftCardOrder::where('trx_hash', $trx_hash)->firstOrFail();
        return view('admin.transactions.giftcard', compact('transaction'));
    }
}
