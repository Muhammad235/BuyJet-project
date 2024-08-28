<?php

namespace App\Http\Controllers\Auth;

use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class VerifyResetPasswordOtpController extends Controller
{
    public function __invoke(Request $request)
    {
        $token = $request->input('otp1') . $request->input('otp2') . $request->input('otp3') . $request->input('otp4');

        $identifier = session('identifier');
        $validate = (new Otp)->validate($identifier, $token);

        if($validate->status){

            $user = User::where('email', $identifier)->first();
            $user->markEmailAsVerified();
            Auth::login($user);
            toastr()->success('Verification successful, login now');
            return to_route('login');
        }

        toastr()->error("Invalid otp");
        return back();
    }
}
