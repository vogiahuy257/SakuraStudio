<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller // Ensure this matches the file name
{
    public function show()
    {
        // Initialize login session status to 'false' and display the login page.
        session(['login' => 'false']);
        return view("Login.login");
    }

    public function login(Request $request)
    {
        // Get user credentials from the request (username and password).
        $credentials = $request->only('username', 'password');

        // Create a key for rate limiting based on the username and the user's IP address.
        $throttleKey = strtolower($credentials['username']) . '|' . $request->ip();

        // Check if the user has exceeded the maximum number of login attempts.
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            // Return to the login page with an error message if too many attempts have been made.
            return redirect()->route('login.show')->withErrors(['login' => 'Too many login attempts. Please try again in ' . RateLimiter::availableIn($throttleKey) . ' seconds.']);
        }

        // Find the user by username in the database.
        $user = User::where('username', $credentials['username'])->first();

        // Verify if the user exists and if the provided password matches the stored hashed password.
        if ($user && Hash::check($credentials['password'], $user->password)) 
        {
            // Log the user in and store their name, ID, and login status in the session.
            Auth::login($user);
            session(['name' => $user->name]);
            session(['user_id' => $user->id]);
            session(['login' => 'true']);

            // Clear the rate limiter for this user after successful login.
            RateLimiter::clear($throttleKey);

            // Redirect based on the user's role (admin or regular user).
            if ($user->role == 'admin') {
                return redirect()->route('admin.show'); // Updated route name
            } else {
                return redirect()->route('user.home'); // Updated route name
            }
        } else {
            // Increment the rate limiter after a failed login attempt.
            RateLimiter::hit($throttleKey, 60); // Lock for 60 seconds after max attempts

            // Return to the login page with an error message indicating invalid credentials.
            return redirect()->route('login.show')->withErrors(['login' => 'Incorrect username or password']);
        }
    }
}
