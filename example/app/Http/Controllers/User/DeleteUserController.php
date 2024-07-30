<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    public function __construct(private readonly UserRepositoryInterface $userRepositoryInterface)
    {
        
    }

        public function __invoke(int $userId)
        
    {            
        
        $this->userRepositoryInterface->deleteUser($userId);
    
    }
}
