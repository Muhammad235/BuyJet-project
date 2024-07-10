<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Cryptocurrency;
use App\Models\GeneralSetting;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index() : View
    {
        $user = auth()->user();
        $general_setings = GeneralSetting::first();
        $cryptocurrencies = Cryptocurrency::all();
        return view('user.dashboard', compact('user', 'general_setings', 'cryptocurrencies'));
    }
}
