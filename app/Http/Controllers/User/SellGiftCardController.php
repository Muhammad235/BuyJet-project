<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Models\GiftCard;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;

class SellGiftCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $general_setings = GeneralSetting::first();
        $giftcards = GiftCard::where('status', Status::ACTIVE)->get();

        return view('user.giftcard.sell', compact('user', 'giftcards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
