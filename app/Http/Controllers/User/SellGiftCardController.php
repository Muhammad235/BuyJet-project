<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Models\Currency;
use App\Models\GiftCard;
use Illuminate\Http\Request;
use App\Models\GiftCardOrder;
use App\Mail\SellGiftCardMail;
use App\Models\GeneralSetting;
use App\Traits\FileUploadTrait;
use App\Traits\GenerateTrxHash;
use Illuminate\Support\Facades\DB;
use App\Models\GiftCardTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\User\StoreGiftCardRequest;

class SellGiftCardController extends Controller
{

    use GenerateTrxHash;
    use FileUploadTrait;


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
        $user = auth()->user();
        $general_setings = GeneralSetting::first();
        $sell_rate = floatval($general_setings->sell_rate);

        try {

            DB::beginTransaction();


            // $fileName = $this->uploadImage($request, 'payment_proof', 'upload/payment_receipt');

            $order = GiftCardOrder::create([
                'trx_hash' => $this->generateTrxHash(6),
                'user_id' => $user->id,
                'gift_card_id' => $request->giftcard_id,
                'currency_id' => $request->currency_id,
                'amount' => floatval($request->amount * $general_setings->sell_rate),
                'with_receipt' => $request->with_receipt,
                'is_physical_card' => $request->is_physical,
                // 'payment_receipt' => $fileName,
            ]);

            Mail::to($order->user->email)->send(new SellGiftCardMail($order, $sell_rate));

            DB::commit();

            return response()->json([
                'status' => 'true',
                'data' => $request->all(),
                'message' => "Request successful"
            ]);


        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'false',
                'message' => 'An error occured try again!',
                "error" => $e->getMessage()
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
