<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Models\SellOrder;
use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Models\GeneralSetting;
use App\Traits\FileUploadTrait;
use App\Traits\GenerateTrxHash;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SellCryptoRequest;

class SellCryptoController extends Controller
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

        return view('user.crypto.sell', compact('data', 'general_setings', 'user', 'cryptocurrencies', 'cryptocurrency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SellCryptoRequest $request)
    {
        // dd($request);

        $request->validated();
        $user = auth()->user();

        $general_setings = GeneralSetting::first();
        $crypto = Cryptocurrency::findorFail($request->cryptocurrency_id);
        $amount = floatval($request->amount);
        $sell_rate = floatval($general_setings->buy_rate);
        $cryptoAmountInNaira = floatval($crypto->charge * $sell_rate) + floatval($amount * $sell_rate);

        // dd($cryptoAmountInNaira);

        try {
            $order = SellOrder::create([
                'trx_hash' => $this->generateTrxHash(6),
                'user_id' => $user->id,
                'cryptocurrency_id' => $crypto->id,
                'asset_network' => $request->asset_network,
                'amount' => $cryptoAmountInNaira,
            ]);

            return redirect()->route('sell.confirm', $order->trx_hash);

        } catch (\Exception $e) {
            dd($e->getMessage());
            toastr()->error('An error occurred during the process');
            return back();
        }
    }

    public function confirm(string $trx_hash){
        $user = auth()->user();
        $order = SellOrder::where('trx_hash', $trx_hash)->first();

        // Extract the selected cryptocurrency and asset network
        $cryptocurrency = $order->cryptocurrency;

        $selectedAssetNetwork = $order->asset_network;
        $assetAddress = '';
        // Check if the selected cryptocurrency has assets
        if ($cryptocurrency && $cryptocurrency->assets) {
            // Parse the assets JSON
            $assets = json_decode($cryptocurrency->assets, true);
            
            // Find the asset with a matching asset network
            $selectedAsset = collect($assets)->first(function ($asset) use ($selectedAssetNetwork) {
                return $asset['assetname'] === $selectedAssetNetwork;
            });
            
            // Check if the selected asset is found
            if ($selectedAsset) {
                $assetAddress = $selectedAsset['assetaddress'];
            }
        }
        $general_settings = GeneralSetting::first(); 
        $amountToSend = $order->amount / $general_settings->sell_rate;
        return view('user.crypto.sell-confirm',compact('general_settings','order','user', 'selectedAssetNetwork','assetAddress', 'amountToSend'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

            $sellorder = SellOrder::where('trx_hash', $trx_hash)->first();
            $fileName = $this->uploadImage($request, 'payment_proof', 'storage/payment_receipt');

            if($sellorder->status == Status::PENDIDNG){
                $sellorder->update([
                    'payment_receipt' => $fileName,
                    'status' => Status::PROCESSING,
                ]);
            }
            
            toastr()->success('Transaction completed');
            return view('user.transaction-success', compact('user'));

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
