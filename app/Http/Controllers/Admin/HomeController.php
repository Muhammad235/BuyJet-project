<?php

namespace App\Http\Controllers\Admin;


use App\Enums\Status;
use App\Models\Ticket;
use App\Models\BuyOrder;
use App\Models\SellOrder;
use Illuminate\Http\Request;
use App\Models\GiftCardOrder;
use App\Models\Cryptocurrency;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){

        $users = User::where('role', Status::USER)->latest()->get();

        $tickets = Ticket::latest()->get();

        $buyOrders = BuyOrder::where('status', Status::PENDIDNG)->get();
        $sellOrders = SellOrder::where('status', Status::PENDIDNG)->get();
        $giftCardOrders = GiftCardOrder::where('status', Status::PENDIDNG)->get();
        $general_settings = GeneralSetting::first();


        $completedTransaction = BuyOrder::where('status', Status::SUCCESS)->sum('amount') +
        GiftCardOrder::where('status', Status::SUCCESS)->sum('amount') +
        SellOrder::where('status', Status::SUCCESS)->sum('amount');

        $pendingTransaction = BuyOrder::where('status', Status::PENDIDNG)->sum('amount') +
        GiftCardOrder::where('status', Status::PENDIDNG)->sum('amount') +
        SellOrder::where('status', Status::PENDIDNG)->sum('amount');



        return view('admin.home', compact('users', 'tickets', 'general_settings', 'buyOrders', 'sellOrders', 'completedTransaction', 'pendingTransaction', 'giftCardOrders'));
    }

    public function edit()
    {
        return view('admin.manage.profile');
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'old_password' => ['required'],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['required','min:8', 'same:new_password'],
        ]);

         // Check if the current password matches the authenticated user's password
         if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }
        Auth::user()->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'Your password has been changed.');
    }
}
