@extends('layouts.app')

@section('content')
    <div class="p-5">
        <form action="{{ route('posts.create') }}" method="post" class="flex flex-col">
            @csrf
            <textarea name="body" placeholder="What's on your mind?" id="" class="w-full h-40 p-5 rounded"></textarea>
            <button class="btn bg-blue-600 hover:bg-blue-800 text-white mt-3 ms-auto">Create</button>
        </form>
        <hr class="h-1 bg-white my-5 rounded">
        <div class="p-5 bg-white rounded mt-5">
            <h1 class="text-xl font-bold">Your Feeds</h1>
            <hr>
            @forelse ($posts as $post)
                <x-post :post="$post" />
            @empty
                <p class="text-red-500 font-semibold">No Posts Yet</p>
            @endforelse

            <div class="my-3"> {{ $posts->links() }} </div>
        </div>
    </div>
@endsection
