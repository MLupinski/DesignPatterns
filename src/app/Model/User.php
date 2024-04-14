<?php

declare(strict_types=1);

namespace App\Model;

class User
{
    private string $email;
    private string $username;

    public function __construct(string $email = '', string $username = '')
    {
        $this->username = $username;
        $this->email    = $email;
    }

    public function save(User $user)
    {
        echo 'Zapisałem do bazy użytkownika o adrese email: ' . $user->email . '<br/>'
            . ' i nazwie użytkownika: ' . $user->username . '<br/>';
    }
}
