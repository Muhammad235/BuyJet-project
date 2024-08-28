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

        // Initialize an empty collection for transactions
        $transactions = collect();

        // Initialize the totalAmount to 0
        // $totalAmount = 0;

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

        // Calculate the totalAmount in one query
        $totalAmount =
            BuyOrder::where('user_id', $user->id)->where('status', Status::SUCCESS)->sum('amount') +
            GiftCardOrder::where('user_id', $user->id)->where('status', Status::SUCCESS)->sum('amount') +
            SellOrder::where('user_id', $user->id)->where('status', Status::SUCCESS)->sum('amount');

        //     $buyOrders = BuyOrder::all()->getQuery();

        // $transactions = SellOrder::union($buyOrders)
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        // $buyOrders = BuyOrder::select(
        //     'id',
        //     'trx_hash',
        //     'cryptocurrency_id',
        //     'asset_network',
        //     'amount',
        //     'payment_receipt',
        //     'created_at',
        //     DB::raw('NULL as gift_card_id'),
        //     // DB::raw('NULL as asset_network'),
        //     DB::raw("'buy' as type")
        // )->getQuery();

        // $giftCardOrders = GiftCardOrder::select(
        //     'id',
        //     'trx_hash',
        //     DB::raw('NULL as cryptocurrency_id'),
        //     DB::raw('NULL as asset_network'),
        //     'gift_card_id',
        //     'currency_id',
        //     'amount',
        //     'payment_receipt',
        //     'created_at',
        //     DB::raw("'sell_giftcard' as type")
        // )->with(['giftcard', 'currency'])
        // ->getQuery();

        $transactions = SellOrder::select(
            'id',
            'trx_hash',
            'cryptocurrency_id',
            'asset_network',
            'amount',
            'payment_receipt',
            DB::raw('NULL as gift_card_id'),
            'created_at',
            DB::raw("'sell' as type")
        )
            // ->union($buyOrders)
            // ->union($giftCardOrders)
            ->orderBy('created_at', 'desc')
            ->get();


            $timeTaken = Benchmark::measure(function () use ($transactions) {
                return $transactions;
            });

            // $times = [];
            // for ($i = 0; $i < 10; $i++) {
            //     $times[] = Benchmark::measure(function () use ($buyOrders, $giftCardOrders) {
            //         return SellOrder::select(
            //             'id',
            //             'trx_hash',
            //             'cryptocurrency_id',
            //             'asset_network',
            //             'amount',
            //             'payment_receipt',
            //             'created_at',
            //             DB::raw("'sell' as type")
            //         )
            //         ->union($buyOrders)
            //         ->union($giftCardOrders)
            //         ->orderBy('created_at', 'desc')
            //         ->get();
            //     });
            // }

            // $averageTime = array_sum($times) / count($times);
            // dd($averageTime);

            // dd($timeTaken);

            // dd($transactions);

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
