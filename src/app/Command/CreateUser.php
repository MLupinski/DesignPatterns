<?php

declare(strict_types=1);

namespace App\Command;

class CreateUser
{
    private string $email;
    private string $username;

    public function __construct(string $email, string $username)
    {
        $this->email = $email;
        $this->username = $username;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function username(): string
    {
        return $this->username;
    }
}
