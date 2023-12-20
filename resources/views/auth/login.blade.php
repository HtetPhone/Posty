<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.scss'])
    <title>Login Form</title>
</head>

<body class="bg-gray-100 h-screen flex flex-col items-center justify-center">

    <a href="{{ route('home') }}">
        <h1 class="text-center text-xl font-bold mb-5">Posty</h1>
    </a>
    <div class="bg-white p-8 rounded shadow-md lg:w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6">Login</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full border-2 border-gray-500 rounded-md p-2 focus:outline-none focus:border-blue-500" 
                    value="{{old('email')}}"
                required>
                @error('email')
                    <p class="text-red-500 font-semibold"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full border-2 border-gray-500 rounded-md p-2 focus:outline-none focus:border-blue-500"
                required>
                @error('password')
                    <p class="text-red-500 font-semibold"> {{ $message }} </p>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-4">
                <label for="remember" class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="text-blue-500">
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>

                <a href="#" class="text-blue-500 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 mb-3 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
            
            <a class="font-semibold text-cyan-500" href="{{route('register')}}">You don't have an account?</a>
        </form>
    </div>

</body>

</html>
