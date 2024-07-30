<?php

namespace App\Http\Controllers\User;

use App\DTOs\AuthUserDto;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function __construct(private readonly UserRepositoryInterface $userRepositoryInterface)
    {
    }
    public function __invoke(Request $request, int $userId)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        $authUserDto = new AuthUserDto;

        $authUserDto->setUserId($userId);
        $authUserDto->setUserName($name);
        $authUserDto->setUserEmail($email);
        $authUserDto->setUserPassword($password);

        $this->userRepositoryInterface->updateUser($authUserDto);
    }
}
