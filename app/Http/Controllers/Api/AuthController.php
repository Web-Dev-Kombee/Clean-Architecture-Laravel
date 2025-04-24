<?php 
namespace App\Http\Controllers\Api;

use App\Application\Services\RegisterUserService;
use App\Domain\User as DomainUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;

class AuthController extends Controller
{
    protected RegisterUserService $service;

    public function __construct(RegisterUserService $service)
    {
        $this->service = $service;
    }

    // Register new user
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // Create User using Clean Architecture's User entity
        $user = new DomainUser(
            $request->name,
            $request->email,
            $request->password
        );

        $createdUser = $this->service->register($user);

        // Issue token
        $token = $createdUser->createToken('MyApp')->accessToken;

        return response()->json([
            'message' => 'User Registered Successfully!',
            'token' => $token
        ]);
    }

    // Login and get Passport token
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('MyApp')->accessToken;

        return response()->json([
            'message' => 'Login successful!',
            'token' => $token
        ]);
    }
}
