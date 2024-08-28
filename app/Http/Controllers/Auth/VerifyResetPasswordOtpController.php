<?php

namespace App\Http\Controllers\Auth;

use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerifyResetPasswordOtpController extends Controller
{
    public function __invoke(Request $request)
    {
        $token = $request->input('otp1') . $request->input('otp2') . $request->input('otp3') . $request->input('otp4');

        $identifier = session('identifier');
        $validate = (new Otp)->validate($identifier, $token);

        if($validate->status){

            return view('auth.reset-password');
        }

        toastr()->error("Invalid otp");
        return back();
    }
}
