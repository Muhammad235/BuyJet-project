<?php

namespace App\Http\Controllers\Admin;

use App\Models\BuyOrder;
use App\Models\GiftCardOrder;
use App\Models\SellOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {

        $transactions = GiftCardOrder::where('user_id', auth()->user()->id)
        ->with('giftcard')
        ->with('currency')
        ->latest()
        ->get();

        $buyTransactions = BuyOrder::where('user_id', auth()->user()->id)
                ->with('cryptocurrency')
                ->latest()
                ->get();

        $sellTransactions = SellOrder::where('user_id', auth()->user()->id)
                ->with('cryptocurrency')
                ->latest()
                ->get();

        return view('admin.transactions.index', compact('transactions','buyTransactions','sellTransactions'));
    }


    public function showBuy(string $trx_hash){
        $transaction = BuyOrder::where('trx_hash', $trx_hash)->firstOrFail();
        return view('admin.transactions.buy', compact('transaction'));
    }

    public function showSell($trx_hash){
        $transaction = SellOrder::where('trx_hash', $trx_hash)->firstOrFail();
        return view('admin.transactions.sell', compact('transaction'));
    }

    public function showGiftCard($trx_hash){
        $transaction = GiftCardOrder::where('trx_hash', $trx_hash)->firstOrFail();
        return view('admin.transactions.giftcard', compact('transaction'));
    }


    public function updateBuy(Request $request, $trx_hash){

        $buy = BuyOrder::where('trx_hash', $trx_hash)->first();

        $buy->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        toastr()->success('Transaction updated successfully');
        return redirect()->back();
    }

    public function updateSell(Request $request, $trx_hash){

        $buy = SellOrder::where('trx_hash', $trx_hash)->first();

        $buy->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        toastr()->success('Transaction updated successfully');
        return redirect()->back();
    }

    public function updateGiftCard(Request $request, $trx_hash){

        $buy = GiftCardOrder::where('trx_hash', $trx_hash)->first();

        $buy->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        toastr()->success('Transaction updated successfully');
        return redirect()->back();
    }



}
