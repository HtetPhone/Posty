<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\LikedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post, Request $request)
    {
        // dd(!$post->likes()->withTrashed()->where('user_id', auth()->id())->get()->count());
        if($post->likedBy($request->user())){
            return response(null, 409); //conflict response
        }
        
        //mailing here
        if(!$post->likes()->onlyTrashed()->where('user_id', auth()->id())->count()) {
            Mail::to($post->user)->send(new LikedPost(auth()->user(), $post));
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        
        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        // $post->delete(); //coz this gonna unlike anyone's like || every like
        return back();
    }

}
