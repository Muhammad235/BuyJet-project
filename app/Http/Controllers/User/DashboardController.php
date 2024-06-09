<?php

namespace App\Http\Controllers\User;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index() : View
    {
        $user = auth()->user();
        $general_setings = GeneralSetting::first();
        return view('user.dashboard', compact('user', 'general_setings'));
    }
}
