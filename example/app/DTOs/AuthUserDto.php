<?php

namespace App\DTOs;

class AuthUserDto
{

    private int $userId;

    private string $userName;

    private string $userEmail;

    private string $userPassword;

    public function getUserId()

    {
        return $this->userId;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserName()

    {
        return $this->userName;
    }

    public function setUserName(string $userName)
    {

        $this->userName = $userName;
    }

    public function getUserEmail()
    {

        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail)
    {

        $this->userEmail = $userEmail;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function setUserPassword(string $userPassword)

    {
        $this->userPassword = $userPassword;
    }
}
