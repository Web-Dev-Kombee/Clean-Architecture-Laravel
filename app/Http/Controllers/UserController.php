<?php

namespace App\Http\Controllers;

use App\Services\RegisterUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $registerUserService;

    public function __construct(RegisterUserService $registerUserService)
    {
        $this->registerUserService = $registerUserService;
        $this->middleware('auth'); // Ensures the user is authenticated
    }

    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'password'   => 'nullable|string|min:8|confirmed',
        ]);

        $this->registerUserService->updateUser($validated);

        return redirect()->route('user.edit')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the user's account from the system.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        $this->registerUserService->deleteUser(auth()->id());
        auth()->logout();

        return redirect('/login')->with('success', 'Account deleted successfully.');
    }
    public function generateUserPDF()
    {
        $user = Auth::user(); // Get the currently authenticated user

        $pdf = Pdf::loadView('pdf.user', compact('user'));

        return $pdf->download('user_profile.pdf'); // Download the PDF
    }
}
