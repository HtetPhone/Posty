<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckLoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    public function __construct()
    {   
        $this->middleware('guest')->except('logout');
    }

    //register
    public function show()
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request)
    {
        $formData = $request->validated();
        $formData['password'] = Hash::make($request->password);
        User::create($formData);

        //asign user
        auth()->attempt($request->only(['email', 'password']));

        return redirect()->route('dashboard');
    }

    //login
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(CheckLoginUserRequest $request)
    {
        // dd($request->remember);
        if(!auth()->attempt($request->only(['email', 'password']),$request->remember)) {
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }

        return redirect()->route('dashboard');
    }

    //logout
    public function logout()
    {
        // logout here
        auth()->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
