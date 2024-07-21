<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use App\Mail\SendOtpMail;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegisterUserRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    //  : RedirectResponse|View
    public function store(RegisterUserRequest $request)
    {
        $userData = $request->validated();

        $user = User::create($userData);

        event(new Registered($user));

        Auth::login($user);
        
        toastr()->success("Registeration successfull");

        return redirect(route('dashboard'));

        
        // $identifier = $request->email;
        // $identifier = "adelekeyahaya05@gmail.com";
        // $type = 'numeric';
        // $length = 4;
        // $validity = 10;
        // $otp = (new Otp)->generate($identifier, $type, $length, $validity);

        // if($otp->status){

        //     // Mail::to($identifier)->send(new SendOtpMail($otp->token));

        //     session(['identifier' => $identifier]);
        //     return view('auth.verify-otp');

        // }

    }
}
