<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Status;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {

        // Validate the request
        $request->validated();

        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (!Auth::attempt($credentials, $request->remember_me)) {
            toastr()->error('Incorrect email or password');
            return redirect()->back()->withInput($request->only('email'));
        }

        $user = Auth::user();
        $userRole = $user->role;


        // If successful, redirect to the intended location
        toastr()->success("Welcome {$user->firstname}");

        // Redirect based on the user's role
        if($userRole === Status::ADMIN) {

            return redirect()->intended('admin');
        } else {
            return redirect()->intended('dashboard');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
