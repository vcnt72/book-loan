<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile')->with('user', $user);
    }

    public function viewChangePassword()
    {
        $user = Auth::user();
        return view('user.change-password')->with('user', $user);
    }

    public function changePassword($id, Request $request)
    {
        $user = User::find($id);

        $request->validate([
            'old_password' => ['required', 'string', 'min:8',],
            'new_password' =>  ['required', 'string', 'min:8']
        ]);

        $input = $request->all();
        if (!Hash::check($input['old_password'], $user->password)) {
            return back()->withErrors(['Old password column must be the same as new password']);
        }

        $user->password = Hash::make($input["new_password"]);
        $user->save();
        return back()->with('success', 'Password changed successfully');
    }

    public function viewUpdateProfile()
    {
        $user = Auth::user();
        return view('user.update-profile')->with('user', $user);
    }

    public function updateProfile($id, Request $request)
    {
        $user = User::find($id);

        $request->validate(['name' => ['required', 'string', 'min:3'], 'email' => ['required', 'email']]);
        $input = $request->all();

        $user->name = $input["name"];
        $user->email = $input["email"];
        $user->save();
        return back()->with('success', 'Profile updated successfully');
    }
}
