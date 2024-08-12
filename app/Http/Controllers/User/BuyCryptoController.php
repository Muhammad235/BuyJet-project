<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Models\BuyOrder;
use App\Mail\BuyOrderMail;
use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Models\GeneralSetting;
use App\Traits\FileUploadTrait;
use App\Traits\GenerateTrxHash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\User\BuyCryptoRequest;

class BuyCryptoController extends Controller
{

    use GenerateTrxHash;
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        $user = auth()->user();

        $data = [];

        $data['cryptocurrency_id'] = $request->query('cryptocurrency') ?? '';
        $data['amount'] = floatval($request->query('amount')) ?? '';

        $general_setings = GeneralSetting::first();

        $cryptocurrencies = Cryptocurrency::all();
        $cryptocurrency = Cryptocurrency::find($data['cryptocurrency_id']);

        return view('user.crypto.buy', compact('data', 'general_setings', 'user', 'cryptocurrencies', 'cryptocurrency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuyCryptoRequest $request)
    {
        $request->validated();
        $user = auth()->user();

        $general_setings = GeneralSetting::first();
        $crypto = Cryptocurrency::findorFail($request->cryptocurrency_id);
        $amount = floatval($request->amount);
        $buy_rate = floatval($general_setings->buy_rate);
        $cryptoAmountInNaira = floatval($crypto->charge * $buy_rate) + floatval($amount * $buy_rate);

        try {

            DB::beginTransaction();

            $order = BuyOrder::create([
                'trx_hash' => $this->generateTrxHash(6),
                'user_id' => $user->id,
                'cryptocurrency_id' => $crypto->id,
                'asset_network' => $request->asset_network,
                'amount' => $cryptoAmountInNaira,
                'wallet_address' => $request->wallet_address,
            ]);

            Mail::to($order->user->email)->send(new BuyOrderMail($order, $buy_rate));

            DB::commit();

            return redirect()->route('buy.confirm', $order->trx_hash);

        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error('An error occurred during the process');
            return back();
        }

    }

    public function confirm(string $trx_hash){
        $user = auth()->user();
        $order = BuyOrder::where('trx_hash', $trx_hash)->first();
        $general_settings = GeneralSetting::first();

        return view('user.crypto.buy-confirm',compact('general_settings','order','user'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $trx_hash)
    {
        $request->validate([
            'payment_proof' =>'required |mimes:jpg,jpeg,png,pdf,doc,docx |max:3072',
        ]);

        $user = auth()->user();

        try {

            $buyorder = BuyOrder::where('trx_hash', $trx_hash)->first();
            $amount = $buyorder->amount;
            $reference = $buyorder->trx_hash;
            $general_settings = GeneralSetting::first();

            $fileName = $this->uploadImage($request, 'payment_proof', 'upload/payment_receipt');

            if($buyorder->status == Status::PENDIDNG){
                $buyorder->update([
                    'payment_receipt' => $fileName,
                    'status' => Status::PENDIDNG,
                ]);
            }

            toastr()->success('Order processing');
            return view('user.transaction-success', compact('user', 'amount', 'reference'));

        } catch (\Exception $e) {
            toastr()->error('Unable to proccess payment at the moment');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
