<?php

namespace App\Http\Controllers\Admin;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralSettingsController extends Controller
{
    public function getRates()
    {
        $rate = GeneralSetting::first();
        return view('admin.manage.rates', compact('rate'));
    }

    public function updateRate(Request $request, GeneralSetting $rate)
    {
        $request->validate([
            'buy_rate' => 'required|numeric',
            'sell_rate' => 'required|numeric',
        ]);

        $rate->update($request->all());

        return redirect()->back()->with('success', 'Rate updated');
    }


    public function updateCharges(Request $request, GeneralSetting $charge)
    {
        $request->validate([
            'with_receipt_charge' => 'required|numeric',
            'with_no_receipt_charge' => 'required|numeric',
            'physical_card_charge' => 'required|numeric',
            'e_code_card_charge' => 'required|numeric',
        ]);

        $charge->update($request->all());

        return redirect()->back()->with('success', 'Charge updated');
    }
}
