<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show admin dashboard
    public function show(Request $request)
    {
        $searchTerm = $request->input('search');
        $usersQuery = User::query();

        if ($searchTerm) {
            $usersQuery->where('username', 'LIKE', "%{$searchTerm}%")
                       ->orWhere('name', 'LIKE', "%{$searchTerm}%")
                       ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                       ->orWhere('phone', 'LIKE', "%{$searchTerm}%")
                       ->orWhere('role', 'LIKE', "%{$searchTerm}%");
        }

        $users = $usersQuery->get();
        return view('Admin.index', compact('users'));
    }

    // Show admin settings page
    public function showSetting()
    {
        return view("Admin.setting");
    }

    // Add a new user
    public function store(StoreRequest $request)
    {
        $hashedPassword = Hash::make($request->password);

        // Create a new user
        User::create([
            'username' => $request->username,
            'password' => $hashedPassword,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'User added successfully');
    }

    // Update existing user information
    public function update(UpdateRequest $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }
        
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;

        // Update password if provided
        if ($request->filled('password')) {
            $hashedPassword = Hash::make($request->password);
            $user->password = $hashedPassword;
        }

        $user->save();

        // Return success message
        return redirect()->back()->with('success', 'Account updated successfully!');
    }

    // Delete a user by ID
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $message = 'Successfully deleted user with ID ' . $id;
        return redirect()->back()->with('success', $message);
    }
}
