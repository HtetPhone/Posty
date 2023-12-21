<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts;
        $likes = $user->likes;
        return view('users.profile.index', compact('user', 'posts', 'likes'));
    }

    public function reset(User $user)
    {
        return view('users.profile.password-reset', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:5|max:255'
        ]);

        if(!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Incorrect Password']);
        }

        $hashPassword = Hash::make($request->new_password);

        $user->update(['password' => $hashPassword]);
        return back()->with(['message' => 'Password has been updated']);
    }
}
