<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->save()) {
            return redirect()->back()->with('message', 'Profile updated successfully!');
        }
        return redirect()->back()->with('error', 'Profile update fail!');
    }

    public function password()
    {
        return view('admin.profile.change-password');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        $updated = User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        if ($updated) {
            return redirect()->back()->with('message', 'Password changed successfully!');
        } else {
            return redirect()->back()->with('error', 'Profile change fail!');
        }
    }
}
