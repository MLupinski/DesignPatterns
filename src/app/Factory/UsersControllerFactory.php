<?php

declare(strict_types = 1);

namespace App\Factory;

use App\Controller\UsersController;
use App\Factory\Interface\Controller;
use App\Model\User;

class UsersControllerFactory implements Controller
{
    public function __construct(private readonly string $instanceName = '\App\Command\Handlers\CreateUserHandler')
    {

    }

    /**
     * @return UsersController
     */
    public function create(): UsersController
    {
        return new UsersController(
           new $this->instanceName(new User())
        );
    }
}