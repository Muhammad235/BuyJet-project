<?php

namespace App\Http\Controllers\Auth;

use Ichtrojan\Otp\Otp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    /**
     * Verify OTP.
    */
    public function __invoke(Request $request)
    {
        $token = $request->input('otp1') . $request->input('otp2') . $request->input('otp3') . $request->input('otp4');

        $identifier = session('identifier');
        $validate = (new Otp)->validate($identifier, $token);
        dd($validate);
    }
    
}
