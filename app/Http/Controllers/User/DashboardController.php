<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Models\BuyOrder;
use App\Models\SellOrder;
use Illuminate\Http\Request;
use App\Models\GiftCardOrder;
use App\Models\Cryptocurrency;
use App\Models\GeneralSetting;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index() : View
    {

        $user = auth()->user();

        // $giftCardOrder = GiftCardOrder::where('user_id', $user->id)
        // ->with('giftcard')
        // ->with('currency')
        // ->latest()
        // ->get();


        // dd($giftCardOrder->giftcard);


        $general_settings = GeneralSetting::first();
        $cryptocurrencies = Cryptocurrency::all();

        $sellOrder = SellOrder::where('user_id', $user->id)
                              ->with('cryptocurrency')
                              ->latest()
                              ->get();

        $buyOrder = BuyOrder::where('user_id', $user->id)
                            ->with('cryptocurrency')
                            ->latest()
                            ->get();

        $giftCardOrder = GiftCardOrder::where('user_id', $user->id)
                            ->with('giftcard', 'currency')
                            ->latest()
                            ->get();

        $transactions = collect()
                        ->merge($sellOrder)
                        ->merge($buyOrder)
                        ->merge($giftCardOrder);

        // dd($transactions);


        $totalAmount = $transactions->filter(function ($transaction) {
            return $transaction->status == Status::SUCCESS;
        })->sum('amount');

        return view('user.dashboard', compact('user', 'general_settings', 'cryptocurrencies', 'transactions', 'sellOrder', 'buyOrder', 'totalAmount'));

    }

    public function allTransactions() : View
    {
        $user = auth()->user();
        $general_setings = GeneralSetting::first();
        $cryptocurrencies = Cryptocurrency::all();

        $sellOrder = SellOrder::where('user_id', $user->id)
                              ->with('cryptocurrency')
                              ->latest()
                              ->get();

        $buyOrder = BuyOrder::where('user_id', $user->id)
                            ->with('cryptocurrency')
                            ->latest()
                            ->get();

        $transactions = collect()
                        ->merge($sellOrder)
                        ->merge($buyOrder);

        return view('user.transaction.index', compact('user', 'general_setings', 'cryptocurrencies', 'transactions'));
    }


}
