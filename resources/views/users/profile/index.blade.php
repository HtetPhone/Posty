@extends('layouts.app')

@section('content')

    <p class="text-4xl font-semibold text-pink-500"> {{$user->name}} </p>
    <hr class="h-1 bg-pink-500 my-3">
    <h1>Statistics</h1>
    <div class="flex my-4 space-x-8">
        <div class="p-5 bg-white rounded flex items-center space-x-1">
            <span class="text-pink-500 text-3xl font-bold"> {{$posts->count()}}</span> <span> {{Str::plural('post', $posts->count())}} </span>
        </div>

        <div class="p-5 bg-white rounded flex items-center space-x-1">
            <span class="text-pink-500 text-3xl font-bold"> {{$likes->count()}}</span> <span> {{Str::plural('like', $likes->count())}} (Gave) </span>
        </div>

        <div class="p-5 bg-white rounded flex items-center space-x-1">
            <span class="text-pink-500 text-3xl font-bold"> {{$user->receivedLikes->count()}}</span> <span> {{Str::plural('like', $user->receivedLikes->count())}} (Recived) </span>
        </div>
    </div>

    <div class="bg-green-300 p-3 rounded">
        <span class="font-semibold">You wanna change your password?</span>
        <a href="{{route('password.reset', auth()->user())}}" class="text-pink-700 hover:text-pink-500 font-bold">Click Here</a>
    </div>
@endsection
