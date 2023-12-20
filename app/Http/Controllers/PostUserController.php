<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()
        ->latest()
        ->with(['likes', 'user'])
        ->paginate(12)
        ->withQueryString();
        return view('users.user-posts', compact('user', 'posts'));
    }
}
