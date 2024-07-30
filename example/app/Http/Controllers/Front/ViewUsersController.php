<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;

class ViewUsersController extends Controller
{
    public function __construct(private readonly UserRepositoryInterface $userRepositoryInterface)
    {
    }

    public function __invoke()
    {
        $users = $this->userRepositoryInterface->listUser();

        return view('users', compact('users'));
    }
}
