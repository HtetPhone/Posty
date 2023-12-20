<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->simplePaginate(12);
        return view('posts.index', compact('posts'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:2|max:255'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function show(Post $post)
    {
        return view('posts.post', compact('post'));
    }

    public function destroy(Post $post) 
    {
        $this->authorize('destroy', $post);

        $post->delete();
        return back();
    }
}
