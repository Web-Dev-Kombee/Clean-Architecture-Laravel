<?php 
namespace App\Infrastructure\Repositories;

use App\Domain\User as DomainUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function store(DomainUser $domainUser)
    {
        return User::create([
            'name' => $domainUser->name,
            'email' => $domainUser->email,
            'password' => Hash::make($domainUser->password),
        ]);
    }
}
