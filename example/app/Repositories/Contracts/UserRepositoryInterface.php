<?php

namespace App\Repositories\Contracts;

use App\DTOs\AuthUserDto;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

interface UserRepositoryInterface
{
    public function createUser(AuthUserDto $authUserDto): void;
    public function listUser(): Collection;
    public function updateUser(AuthUserDto $authUserDto): void;
    public function deleteUser($userId): void;
    public function findByEmail(string $email): ?User;
}
