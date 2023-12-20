@extends('layouts.app')

@section('content')
    <div class="p-5 bg-white  rounded mb-5">
        <h1 class="text-2xl font-semibold text-pink-500"> {{$user->name}} </h1>
        <p class="my-3 text-gray-400">
            <span>Posted  {{$posts->count()}} {{Str::plural('post', $posts->count())}} </span> &
            <span> received {{$user->receivedLikes()->count()}}  {{Str::plural('like', $user->receivedLikes()->count())}}.</span>
        </p>
        <hr class="h-1 bg-pink-500 rounded">

        @forelse ($posts as $post)
            <x-post :post="$post" />
        @empty
            <p class="text-red-500 font-semibold">No Posts Yet</p>
        @endforelse
        
    </div>
@endsection
