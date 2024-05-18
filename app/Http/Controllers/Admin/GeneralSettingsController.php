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
            'buy_rate' => 'required',
            'sell_rate' => 'required',
        ]);

        $rate->update($request->all());

        return redirect()->back()->with('success', 'Rate updated');
    }
}
