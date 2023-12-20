@extends('layouts.app')

@section('content')
    <div class="p-5 bg-white rounded">
        <x-post :post="$post" />
    </div>
@endsection
