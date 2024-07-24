<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileUpdateRequest;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        return view('user.settings.index', compact('user'));
    }

    public function bankInfo()
    {
        $user = auth()->user();

        return view('user.settings.bank-info', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        dd($request->avatar);

        toastr()->success('Details updated successfully');
        $user->update($request->all());
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
