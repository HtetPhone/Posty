@extends('layouts.app')

@section('content')
    <p class="test"> Dashboard</p>
   <div class=" overflow-auto">
    <p>
        {{ Auth::user() }}
    </p>
    <p class="whitespace-pre-line">
        {{ session('user')}}
    </p>
   </div>
@endsection