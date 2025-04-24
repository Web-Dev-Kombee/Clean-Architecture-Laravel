<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to retrieve the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Email not found
            return redirect()->back()->withInput()->with('email_error', "We couldn't find an account with that email address.");
        }

        if (!Hash::check($request->password, $user->password)) {
            // Password does not match
            return redirect()->back()->withInput()->with('password_error', 'The password you entered is incorrect.');
        }

        // Log in the user
        Auth::login($user);

        // Redirect to dashboard with success message
        return redirect('dashboard')->with('success', 'Login successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
