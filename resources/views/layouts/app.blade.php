<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/_custom.scss'])
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-blue-500 p-6 px-10 sticky top-0">
        <div class="container mx-auto flex items-center">
            <!-- Logo -->
            <a href="{{route('home')}}" class="text-white text-lg font-bold">Posty</a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex space-x-4 ms-8">
                @auth
                <a href="{{route('dashboard')}}" class="text-white nav-link">Dashboard</a>
                <a href="{{route('profile.user', auth()->user())}}" class="text-white nav-link">Profile</a>
                @endauth
                <a href="{{route('posts.index')}}" class="text-white nav-link">Posts</a>
            </div>

            {{-- login|registe|user --}}
            <div class="hidden lg:flex space-x-2 ms-auto items-center">
                @guest
                <a href="{{route('login')}}" class=" text-orange-300 nav-link">Login</a>
                <a href="{{route('register')}}" class="text-orange-300 nav-link">Register</a>
                @endguest
                @auth
                    <div class="bg-gray-300 p-2 px-4 rounded flex space-x-1 hover:bg-white">
                        <i class="w-5" data-feather="user"></i>
                        <p class="font-semibold"> {{auth()->user()->name}} </p>
                    </div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>


            <!-- Mobile Navigation Toggle -->
            <div class="lg:hidden ms-auto">
                <button id="mobile-menu-toggle" class="text-white focus:outline-none">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-gray-800 sticky top-0">
        <div class="container mx-auto py-4 px-10 space-y-2">
            @auth
            <a href="{{route('dashboard')}}" class="text-white block nav-link">Dashboard</a>
            <a href="{{route('profile.user', auth()->user())}}" class="text-white block nav-link">Profile</a>
            @endauth
            <a href="{{route('posts.index')}}" class="text-white block nav-link">Posts</a>
            <div class="flex space-x-2 ms-auto">
                @guest
                    <a href="{{route('login')}}" class=" text-orange-300 nav-link">Login</a>
                    <a href="{{route('register')}}" class="text-orange-300 nav-link">Register</a>
                @endguest

                @auth
                <button class="bg-gray-300 p-1 px-4 rounded flex space-x-1 hover:bg-white">
                    <i class="w-5" data-feather="user"></i>
                    <p class="font-semibold"> {{auth()->user()->name}} </p>
                </button>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="bg-red-500 hover:bg-red-700 rounded p-1 px-4 ">
                        Logout
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>



    <main class="px-10 mt-5">
       <div class="bg-gray-200 rounded p-5">
        @yield('content')
       </div>
    </main>
</body>

</html>
