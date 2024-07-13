<?php

namespace App\Http\Controllers\User;

use App\Models\BuyOrder;
use App\Models\SellOrder;
use Illuminate\Http\Request;
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
        $general_setings = GeneralSetting::first();
        $cryptocurrencies = Cryptocurrency::all();

        $sellOrder = SellOrder::where('user_id', $user->id)->with('cryptocurrency')->latest()->take(10)->get();
        $buyOrder = BuyOrder::where('user_id', $user->id)->with('cryptocurrency')->latest()->take(10)->get();

        $transactions = collect()
                ->merge($sellOrder)
                ->merge($buyOrder);

        // dd($transactions);

        return view('user.dashboard', compact('user', 'general_setings', 'cryptocurrencies', 'transactions'));
    }
}
