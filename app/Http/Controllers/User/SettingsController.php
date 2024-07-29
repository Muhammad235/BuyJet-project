<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use FileUploadTrait;

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
        $data = $request->validated();

        $user = auth()->user();

        $data['avatar'] = $this->uploadImage($request, 'avatar', '/upload/avatar');
        $user->update($data);

        toastr()->success('Details updated successfully');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
