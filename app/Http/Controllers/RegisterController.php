<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view("Login.register");
    }

    public function store(RegisterRequest $request)
    {
        $password = Hash::make($request->password);

        // Create new user
        User::create([
            'username' => $request->username,
            'password' => $password,
            'name' => $request->name,
            'role' => 'user',
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Flash success message and redirect to login page
        session()->flash('success', 'Registration successful!');
        return redirect()->route('login.show');
    }   
}
