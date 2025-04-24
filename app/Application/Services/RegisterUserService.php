<?php
//this is code for registeruserservice.php
namespace App\Application\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserService
{
    // Register a new user
    public function register(array $data): User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'technologies_interested' => json_encode($data['technologies_interested'] ?? []),
            'experience' => $data['experience'] ?? 0,
        ]);
    }

    // Update an existing user
    public function updateUser(array $data): User
    {
        $user = auth()->user();
        $user->update([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => isset($data['password']) ? Hash::make($data['password']) : $user->password,
            'technologies_interested' => json_encode($data['technologies_interested'] ?? $user->technologies_interested),
            'experience' => $data['experience'] ?? $user->experience,
        ]);
        
        return $user;
    }
    
    // Delete a user by ID
    public function deleteUser($userId): void
    {
        User::findOrFail($userId)->delete();
    }
}
