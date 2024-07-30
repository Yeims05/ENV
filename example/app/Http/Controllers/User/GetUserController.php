<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;

class GetUserController extends Controller
{
    public function __construct(private readonly UserRepositoryInterface $userRepositoryInterface)
    {
    }

    public function __invoke()
    {
        $users = $this->userRepositoryInterface->listUser();

        // Depuración
        dd($users);

        return view('users', compact('users'));
    }
}
