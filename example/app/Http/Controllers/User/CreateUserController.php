<?php

namespace App\Http\Controllers\User;

use App\DTOs\AuthUserDto;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function __invoke(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        $authUserDto = new AuthUserDto();
        $authUserDto->setUserName($name);
        $authUserDto->setUserEmail($email);
        $authUserDto->setUserPassword($password);

        $this->userRepository->createUser($authUserDto);

        return redirect('home');
    }
}
