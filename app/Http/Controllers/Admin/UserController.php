<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Display a listing of users
        $users = User::all(); // Assuming you have a User model
        return view('admin.user.index', compact('users')); // Adjust the view path as necessary
    }

    public function create()
    {
        // Show the form for creating a new user
    }

    public function store(Request $request)
    {
        // Store a newly created user in storage
    }

    public function edit($id)
    {
        // Show the form for editing the specified user
        $user = User::findOrFail($id); // Assuming you have a User model
        return view('admin.user.edit', compact('user')); // Adjust the view path as necessary
    }

    public function update(Request $request, $id)
    {
        // Update the specified user in storage
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
         
        ]);
        
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        // Remove the specified user from storage
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function show($id)
    {
        // Display the specified user
    }
}
