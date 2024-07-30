<?php

namespace App\Repositories\User;

use App\DTOs\AuthUserDto;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function createUser(AuthUserDto $authUserDto): void
    {

        $passwordHash = Hash::make($authUserDto->getUserPassword());

        User::create([

            'name' =>  $authUserDto->getUserName(),
            'email' =>  $authUserDto->getUserEmail(),
            'password' =>  $passwordHash,
        ]);
    }

    public function listUser(): Collection
    {
        return User::all();
    }

    public function updateUser(AuthUserDto $authUserDto): void
    {
        $user = User::find($authUserDto->getUserId());

        $passwordHash = Hash::make($authUserDto->getUserPassword());
        $user->userName = $authUserDto->getUserName();
        $user->userEmail = $authUserDto->getUserEmail();
        $user->passwordhash = $passwordHash;

        $user->save();
    }
    public function deleteUser($userId): void
    {
        $user = User::find($userId);
        $user->delete();
    }

    public function findByEmail(string $email): ?User{

        return User::where('email', '=', $email)->first();
    }
}
