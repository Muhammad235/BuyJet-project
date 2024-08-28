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


     public function store(RegisterUserRequest $request)
     {
         $userData = $request->validated();

         $checkUser = User::where('email', $userData['email'])->first();

         // If the user exists and their email is verified
         if ($checkUser && $checkUser->email_verified_at) {
             toastr()->info('This email is already registered. Please log in.');
             return redirect()->route('login');
         }

         // If the user exists but their email is not verified
         if ($checkUser) {
             $checkUser->update($userData);
         } else {
             $checkUser = User::create($userData);
             event(new Registered($checkUser));
         }

         // Send OTP
         $sendOtp = $this->sendOtp($userData['email']);

         if (!$sendOtp) {
             toastr()->error('Failed to send OTP. Please try again.');
             return back();
         }

         session(['identifier' => $userData['email']]);
         return view('auth.register-otp');
    }


    public function sendOtp(string $identifier)
    {
        $type = 'numeric';
        $length = 4;
        $validity = 10;
        $otp = (new Otp)->generate($identifier, $type, $length, $validity);

        if ($otp->status) {
            try {
                // Mail::to($identifier)->queue(new SendOtpMail($otp->token));
                Mail::to($identifier)->send(new SendOtpMail($otp->token));
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
        // OTP generation failed
        return false;
    }
}

