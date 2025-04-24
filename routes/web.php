<?php

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return redirect()->route('login');
});

// Registration (Blade)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Login (Blade)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/user/pdf', [RegisterController::class, 'generateUserPDF'])->middleware('auth')->name('user.pdf');

// Dashboard (after login)
Route::get('/dashboard', function () {
    return view('dashboard'); // create dashboard.blade.php if needed
})->middleware('auth')->name('dashboard');

Route::get('/test', function () {
    return view('test'); // create dashboard.blade.php if needed
})->middleware('auth')->name('test');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.delete');
});
// // Update user profile
// Route::put('/profile/update', [RegisterController::class, 'update'])->name('profile.update');

// // Delete user profile
// Route::delete('/profile/delete', [RegisterController::class, 'destroy'])->name('profile.delete');
// Route::get('/profile/edit', [RegisterController::class, 'edit'])->name('profile.edit');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [RegisterController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [RegisterController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [RegisterController::class, 'destroy'])->name('profile.delete');
    Route::get('/profile', [RegisterController::class, 'show'])->name('profile.show');
});