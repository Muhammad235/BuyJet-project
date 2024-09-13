<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Models\BuyOrder;
use App\Models\SellOrder;
use Illuminate\Http\Request;
use App\Models\GiftCardOrder;
use App\Models\Cryptocurrency;
use App\Models\GeneralSetting;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index(Request $request) : View
    {
        $user = auth()->user();

        $general_settings = GeneralSetting::first();
        $cryptocurrencies = Cryptocurrency::all();

        $type = $request->get('type', 'buy');

        // Initialize the totalAmount to 0
        $totalAmount = 0;

        // Fetch transactions
        switch ($type) {
            case 'sell':
                $transactions = SellOrder::where('user_id', $user->id)
                    ->with('cryptocurrency')
                    ->latest()
                    ->get();
                $type = "Sell Crypto";
                break;

            case 'giftcard':
                $transactions = GiftCardOrder::where('user_id', $user->id)
                    ->with('giftcard', 'currency')
                    ->latest()
                    ->get();
                $type = "Sell Gift Card";
                break;

            default:
                $transactions = BuyOrder::where('user_id', $user->id)
                    ->with('cryptocurrency')
                    ->latest()
                    ->get();
                $type = "Buy Crypto";
                break;
        }

        // Total successful transaction amount
        $totalAmount =
            BuyOrder::where('user_id', $user->id)->where('status', Status::SUCCESS)->sum('amount') +
            GiftCardOrder::where('user_id', $user->id)->where('status', Status::SUCCESS)->sum('amount') +
            SellOrder::where('user_id', $user->id)->where('status', Status::SUCCESS)->sum('amount');


        return view('user.dashboard', compact('user', 'general_settings', 'cryptocurrencies', 'transactions', 'type', 'totalAmount'));
    }


    public function allTransactions(Request $request) : View
    {
        $user = auth()->user();
        $general_setings = GeneralSetting::first();
        // $cryptocurrencies = Cryptocurrency::all();

        $type = $request->get('type', 'buy');

              // Fetch transactions
              switch ($type) {
                case 'sell':
                    $transactions = SellOrder::where('user_id', $user->id)
                        ->with('cryptocurrency')
                        ->latest()
                        ->get();
                    $type = "Sell";
                    break;

                case 'giftcard':
                    $transactions = GiftCardOrder::where('user_id', $user->id)
                        ->with('giftcard', 'currency')
                        ->latest()
                        ->get();
                    $type = "Gift Card";
                    break;

                default:
                    $transactions = BuyOrder::where('user_id', $user->id)
                        ->with('cryptocurrency')
                        ->latest()
                        ->get();
                    $type = "Buy";
                    break;
            }

        return view('user.transaction.index', compact('user', 'general_setings', 'type', 'transactions'));
    }

}
