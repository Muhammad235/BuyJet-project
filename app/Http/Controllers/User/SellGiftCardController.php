<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Http\Requests\User\StoreGiftCardRequest;
use App\Models\Currency;
use App\Models\GiftCard;
use App\Models\GiftCardTransaction;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Traits\FileUploadTrait;
use App\Traits\GenerateTrxHash;

class SellGiftCardController extends Controller
{

    use GenerateTrxHash;
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $general_settings = GeneralSetting::first();
        $giftcards = GiftCard::where('status', Status::ACTIVE)->get();
        $currencies = Currency::where('status', Status::ACTIVE)->get();

        return view('user.giftcard.sell', compact('user', 'giftcards', 'currencies', 'general_settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGiftCardRequest $request)
    {

        $validate = $request->validated();

        try {
            $user = auth()->user();
            $general_setings = GeneralSetting::first();

            // $order = GiftCardTransaction::create([
            //     'trx_hash' => $this->generateTrxHash(6),
            // ]);

            return response()->json([
                'status' => 'true',
                'data' => $request->all(),
                'message' => "Request successful"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'An error occured try again!',
            ]);
        }

    }

         // if ($validate->fails()) {
        //     return response()->json([
        //         'status' => "false",
        //          "message"=> $validate->errors()->first(),
        //       ]);
        // }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
