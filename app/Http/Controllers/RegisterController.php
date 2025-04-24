<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Application\Services\RegisterUserService;

class RegisterController extends Controller
{
    protected $registerUserService;

    public function __construct(RegisterUserService $registerUserService)
    {
        $this->registerUserService = $registerUserService;
    }

    // Show the registration form
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle form submission
    public function register(Request $request)
    {
        // Validate the input
        $request->validate([
            'first_name' => 'required|string|max:15',
            'last_name'  => 'required|string|max:15',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6|confirmed',
            'technologies_interested' => 'nullable|array',
            'experience' => 'required|integer|min:0|max:25',
        ]);

        // Register the user
        $user = $this->registerUserService->register([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => $request->password,
            'technologies_interested' => $request->technologies_interested,
            'experience' => $request->experience,
        ]);

        // Login the user
        auth()->login($user);

        // Redirect after successful registration
        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    // Generate PDF for the authenticated user
    public function generateUserPDF()
    {
        $user = Auth::user(); // Get the currently authenticated user

        $pdf = Pdf::loadView('pdf.user', compact('user'));

        return $pdf->download('profile.pdf'); // Download the PDF
    }
    public function edit()
    {
        $user = Auth::user(); // Get the currently authenticated user

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        // Validate the input
        $request->validate([
            'first_name' => 'required|string|max:15',
            'last_name'  => 'required|string|max:15',
            'email'      => 'required|email|unique:users,email,' . $user->id, // Skip validation for current email
            'technologies_interested' => 'nullable|array',
            'experience' => 'required|integer|min:0|max:25',
        ]);

        // Update the user details
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->technologies_interested = json_encode($request->technologies_interested); // Store as JSON
        $user->experience = $request->experience;
        $user->save(); // Save the updated user

        // Redirect with success message
        return redirect('dashboard');
    }
    public function destroy()
{
    $user = Auth::user(); // Get the currently authenticated user

    // Delete the user
    $user->delete();

    // Log the user out after deletion
    Auth::logout();

    // Redirect to the login form or the main route
    //return redirect()->route('/'); // This redirects to the login form
    // Or alternatively, you can use:
    // return redirect('/'); // This redirects to the main route ("/")
}

    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }


}
