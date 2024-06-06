<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index() : View
    {
        return view('user.dashboard');
    }
}
