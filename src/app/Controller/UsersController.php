<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\CommandBus;
use App\Command\CreateUser;
use App\Command\Handlers\CreateUserHandler;
use GuzzleHttp\Psr7\Response;

class UsersController
{
    public function __construct(private readonly CreateUserHandler $createUserHandler)
    {
    }

    /**
     * @return void
     */
    public function index(): void
    {
        echo 'Users';
    }

    /**
     * @return void
     */
    public function createUser(): void
    {
        $command = new CreateUser(
            (string) $_GET['email'],
            (string) $_GET['username']
        );

        $commandBus = CommandBus::getInstance();
        $commandBus->handle($command);
    }
}
