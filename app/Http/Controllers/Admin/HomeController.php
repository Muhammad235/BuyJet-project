<?php

namespace App\Http\Controllers\Admin;


use App\Models\BuyOrder;
use App\Models\SellOrder;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    public function index(){

        // $users = User::where('role', 'user')->latest()->get();
        $users = User::latest()->get();
        $tickets = Ticket::latest()->get();
        // $crypto = Cryptocurrency::all();
        // $transactions = Transactions::all();

        $crypto = 4;
        // $buyorders = BuyOrder::where('status','pending')->latest()->get();
        // $sellorders = SellOrder::where('status','pending')->latest()->get();
        // $rate = Rate::first();
        
        return view('admin.home', compact('users', 'tickets', 'crypto',));
    }
}
