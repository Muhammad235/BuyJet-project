<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminBank;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminBankRequest;

class ManageController extends Controller
{
    public function getBanks()
    {
        $bank = GeneralSetting::first();
        return view('admin.manage.banks', compact('bank'));
    }

    public function updateBank(AdminBankRequest $request, GeneralSetting $bank){
        

        if($request->bank_name !== 'other'){
            $bank->update([
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
            ]);
        } else{
            $request->validate([
                'new_bank_name' => 'required',
            ]);
            $bank->update([
                'bank_name' => $request->new_bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
            ]);
        }

        return redirect()->back()->with('success', 'Bank updated');
    }
}
