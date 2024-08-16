<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


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

        if($validate->status){

            if (request()->routeIs('register')) {
                $user = User::where('email', $identifier)->first();
                $user->markEmailAsVerified();
                Auth::login($user);
                toastr()->success('Registration successful');
                return to_route('dashboard');

            }else if (request()->routeIs('verify.otp')) {

                return view('auth.reset-password');
            }

        }

        toastr()->error("Invalid otp");
        return view('auth.verify-otp');
    }

    // public function index(){
    //     return view('auth.verify-otp');
    // }
}
