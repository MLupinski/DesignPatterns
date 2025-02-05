<?php

declare(strict_types=1);

namespace App\Command\Handlers;

use App\Command\CreateUser;
use App\Model\User;

class CreateUserHandler
{
    public function __construct(private readonly User $user)
    {
    }

    public function handle(CreateUser $command): void
    {
        $this->user->setEmail($command->email());
        $this->user->setUsername($command->username());

        $this->user->save();
    }
}
