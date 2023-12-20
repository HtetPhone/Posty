<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.scss')
    <title>Register Form</title>
</head>
<body class="bg-gray-100 min-h-screen py-10 flex flex-col items-center justify-center">

    <a href="{{ route('home') }}">
        <h1 class="text-center text-xl font-bold mb-5">Posty</h1>
    </a>
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6">Register</h2>

        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Username</label>
                <input type="text" id="name" name="name" 
                class="w-full border-2 border-gray-500 rounded-md p-2 focus:outline-none focus:border-blue-500"
                value="{{old('name')}}"
                required>
                @error('name')
                    <p class="text-red-500"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" 
                class="w-full border-2 border-gray-500 rounded-md p-2 focus:outline-none focus:border-blue-500" 
                value="{{old('email')}}"
                required>
                @error('email')
                    <p class="text-red-500"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full border-2 border-gray-500 rounded-md p-2 focus:outline-none focus:border-blue-500" required>
                @error('password')
                    <p class="text-red-500"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border-2 border-gray-500 rounded-md p-2 focus:outline-none focus:border-blue-500" required>
            </div>

            <button type="submit" class="w-full mb-3 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Register</button>
            <a class="font-semibold text-cyan-500" href="{{route('login')}}">Already have an account?</a>
        </form>
    </div>

</body>
</html>
