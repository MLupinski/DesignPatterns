<?php

declare(strict_types = 1);

namespace App\Command;

class DeleteUser
{
    public function __construct(private readonly int $userId)
    {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}