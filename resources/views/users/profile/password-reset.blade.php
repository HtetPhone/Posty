@extends('layouts.app')

@section('content')
   <h3 class="font-bold text-lg">You wanna change your password,  {{$user->name}}? </h3>
   <hr class="h-1 bg-pink-500 my-3">

   @if (session()->has('message'))
    <p class="bg-blue-200 p-4 rounded my-5  ">
        {{ session('message') }}
    </p>
   @endif
   <div class="bg-white rounded p-5 w-3/5 mx-auto">
    <form action="{{route('password.reset', auth()->user())}}" method="post" class="">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-medium mb-2">Old Password</label>
            <input type="password" name="old_password"
                class="w-full border-2 border-gray-500 rounded-md p-2 focus:outline-none focus:border-blue-500"
            required>
            @error('old_password')
                <p class="text-red-500 font-semibold"> {{ $message }} </p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-medium mb-2">New Password</label>
            <input type="password" name="new_password"
                class="w-full border-2 border-gray-500 rounded-md p-2 focus:outline-none focus:border-blue-500"
            required>
            @error('new_password')
                <p class="text-red-500 font-semibold"> {{ $message }} </p>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="w-2/5 bg-blue-500 mb-3 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                Update
            </button>
        </div>
    </form>
   </div>

@endsection
