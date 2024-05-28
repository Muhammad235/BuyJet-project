<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Enums\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', Status::USER)->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.details', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update(['status' => $request->status]);
        return back()->with('success', 'Status updated successfully');
    }
}
