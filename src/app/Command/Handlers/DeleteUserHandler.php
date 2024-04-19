<?php

declare(strict_types=1);

namespace App\Command\Handlers;

use App\Command\DeleteUser;
use App\Model\User;

class DeleteUserHandler
{
    public function __construct(private readonly User $user)
    {
    }

    public function handle(DeleteUser $command)
    {
        $this->user->setUserId($command->getUserId());
        $this->user->delete();
    }
}