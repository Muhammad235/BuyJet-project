<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ResetPasswordController extends Controller
{

    public function update(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed']
        ]);

        $identifier = session('identifier');

        $user = User::where('password', $identifier);
        $user->update(['password'=> Hash::make($request->password)]);

        toastr()->success('Password reset successful, you can now login');
        return redirect()->route('login');
    }

}
