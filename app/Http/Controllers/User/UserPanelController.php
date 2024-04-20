<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;

class UserPanelController extends Controller
{
    public function index()
    {
        $data=[];
        $data['categories']=Category::all();

        // Your logic for displaying the user panel index page
        return view('user.dashboard.index',compact('data'));
    }

    public function edit()
    {
        // Fetch the authenticated user
        $user = auth()->user();

        // Your logic for displaying the user profile edit form
        return view('user.panel.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:8|confirmed',
            // Add other fields as needed
        ]);

        // Fetch the authenticated user
        $user = auth()->user();

        // Update user data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
            // Add other fields as needed
        ]);

        // Your logic for handling image upload if needed
        // Example: $user->update(['image' => $request->file('image')->store('avatars')]);

        // Your logic for redirecting with a success message
        return redirect()->route('user.profile.edit')->with('success', 'Profile updated successfully.');
    }
}

