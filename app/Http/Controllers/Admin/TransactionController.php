<?php

namespace App\Http\Controllers\Admin;

use App\Models\BuyOrder;
use App\Models\SellOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function showBuy(string $trx_hash){
        $transaction = BuyOrder::where('trx_hash', $trx_hash)->firstOrFail();
        return view('admin.transactions.buy', compact('transaction'));
    }

    public function updateBuy(Request $request, $trx_hash){

        $buy = BuyOrder::where('trx_hash', $request->trx_hash)->first();

        $buy->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        toastr()->success('Transaction updated successfully');
        return redirect()->back();
    }

    public function showSell($trx_hash){
        $transaction = SellOrder::where('trx_hash', $trx_hash)->firstOrFail();
        return view('admin.transactions.sell', compact('transaction'));
    }

    
}
