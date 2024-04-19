<?php

declare(strict_types=1);

namespace App\Model;

class User
{
    private string $email;

    private string $username;

    private int $userId;

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function save()
    {
        echo 'Zapisałem do bazy użytkownika o adrese email: ' . $this->email . '<br/>'
            . ' i nazwie użytkownika: ' . $this->username . '<br/>';
    }

    public function delete()
    {
        echo 'User o ID ' . $this->userId . ' został usunięty';
    }
}
