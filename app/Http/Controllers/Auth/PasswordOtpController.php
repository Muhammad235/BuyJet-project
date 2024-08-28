<?php

namespace App\Http\Controllers\Auth;

use Ichtrojan\Otp\Otp;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class PasswordOtpController extends Controller
{
    public function create()
    {
        return view("auth.forget-password");
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email']
        ]);

        $sendOtp = $this->sendOtp($request->email);

        if (!$sendOtp) {
            toastr()->error('Failed to send OTP. Please try again.');
            return back();
        }

        session(['identifier' => $request->email]);
        // return view('auth.verify-otp');
    }

    public function sendOtp(string $identifier)
    {
        $type = 'numeric';
        $length = 4;
        $validity = 10;
        $otp = (new Otp)->generate($identifier, $type, $length, $validity);

        if ($otp->status) {
            try {
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
