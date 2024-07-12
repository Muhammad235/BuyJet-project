<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Models\BuyOrder;
use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Models\GeneralSetting;
use App\Traits\FileUploadTrait;
use App\Traits\GenerateTrxHash;
use App\Http\Controllers\Controller;
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


        // $cryptocurrency = Cryptocurrency::find($data['cryptocurrency_id']);

        // if($cryptocurrency){
            
        //     $cryptocurrencies = Cryptocurrency::all();
        //     return view('user.crypto.buy', compact('data', 'general_setings', 'user', 'cryptocurrencies'));

        // } 
        // else{
        //     toastr()->error('Select a valid cryptocurrency');
        //     return redirect()->back();
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuyCryptoRequest $request)
    {

        $request->validated();
        $user = auth()->user();

        // dd($request);
        
        $general_setings = GeneralSetting::first();
        $crypto = Cryptocurrency::findorFail($request->cryptocurrency_id);
        $amount = floatval($request->amount);
        $buy_rate = floatval($general_setings->buy_rate);
        $cryptoAmountInNaira = floatval($crypto->charge * $buy_rate) + floatval($amount * $buy_rate);

        // dd($cryptoAmountInNaira);

        try {
            $order = BuyOrder::create([
                'trx_hash' => $this->generateTrxHash(6),
                'user_id' => $user->id,
                'cryptocurrency_id' => $crypto->id,
                'asset_network' => $request->asset_network,
                'amount' => $cryptoAmountInNaira,
                'wallet_address' => $request->wallet_address,
            ]);

            return redirect()->route('buy.confirm', $order->trx_hash);

        } catch (\Exception $e) {
            // dd($e->getMessage());
            toastr()->error('An error occurred during the process');
            return back();
        }

    }

    public function confirm(string $trx_hash){
        $user = auth()->user();
        $order = BuyOrder::where('trx_hash', $trx_hash)->first();
        $general_settings = GeneralSetting::first(); 
        // dd($buyorder);
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
            $fileName = $this->uploadImage($request, 'payment_proof', 'storage/payment_receipt');

            // dd($request->payment_proof);
            dd($fileName);

            if($buyorder->status == Status::PENDIDNG){
                $buyorder->update([
                    'payment_proof' => $fileName,
                    'status' => Status::SUCCESS,
                ]);
            }
            toastr()->success('Transaction successful');
            return view('user.transaction-success', compact('user'));

        } catch (\Exception $e) {
            dd($e->getMessage());
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
