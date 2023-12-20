@props(['post'])
<div class="my-3 mb-7 space-y-1 p-5 px-10">
    <div class="flex items-center">
        <a href="{{route('users.posts', $post->user)}}" class="hover:text-pink-500">
            <p class="text-lg font-semibold"> {{ $post->user->name }} </p>
        </a>
        <p class="text-sm text-gray-500 ms-5">
            {{ $post->created_at->diffForHumans() }}
        </p>
        @can('destroy', $post)
            <form action="{{ route('posts.delete', $post) }}" method="POST" class="ms-auto">
                @csrf
                @method('DELETE')
                <button class="text-red-700 hover:bg-red-700 hover:text-white py-1 px-2 rounded">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        @endcan
    </div>
    <p class=""> {{ $post->body }} </p>
    <div class="flex space-x-4">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="POST">
                    @csrf
                    <button class="text-pink-600">
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        Like</button>
                </form>
            @else
                <form action="{{ route('likes.delete', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-pink-600"> <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                        Unlike</button>
                </form>
            @endif
        @endauth
        <p class="text-gray-500"> {{ $post->likes()->count() }}
            {{ Str::plural('like', $post->likes()->count()) }} </p>
    </div>
</div>
<hr>