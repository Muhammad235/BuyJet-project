<?php

namespace App\Http\Controllers\User;

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
        return view('user.crypto.buy', compact('data', 'general_setings', 'user'));


        // $cryptocurrency = Cryptocurrency::find($cryptocurrency_id);

        // if($cryptocurrency){
            
            // if(empty($data['amount'])) {
            //     $general_setings = GeneralSetting::first();
            //     return view('user.crypto.buy', compact('data', 'general_setings'));
            // }else {
            //     toastr()->warning('You can purchase within $2 to $50');
            //     return back();
            // }

        // } 
        // else{
        //     toastr()->error('Select a valid cryptocurrency');
        //     return back();
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuyCryptoRequest $request)
    {
        $request->validated();
        $user = auth()->user();
        
        try {
            // BuyOrder::create([
            //     'trx_hash' => $this->generateTrxHash(6),
            //     'user_id' => $user->id,
            //     'cryptocurrency_id' => $user->id,
            //     'asset_network' => $user->id,
            //     'amount' => $request->amount,
            //     'wallet_address' => $request->wallet_address,
            // ]);

            return redirect()->route('buy.confirm', '3445334');

        } catch (\Exception $e) {
            toastr()->error('An error occurred during the process');
            return back();
        }

    }

    public function confirm($id){
        $user = auth()->user();
        // $buyorder = BuyOrder::where('trx_hash', $id)->first();
        $buyorder = '';
        $general_settings = GeneralSetting::first(); 
        return view('user.crypto.buy-confirm',compact('general_settings','buyorder','user'));
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
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'payment_proof' =>'required |mimes:jpg,jpeg,png,pdf,doc,docx |max:3072',
        // ]);


        dd($request);

        // $buyorder = BuyOrder::find($request->id);
        // $fileName = $this->uploadImage($request, $request->payment_proof, 'storage/payment_receipt');
        // $buyorder->update([
        //     'payment_proof' => $fileName
        // ]);

        // toastr()->success('Payment successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
