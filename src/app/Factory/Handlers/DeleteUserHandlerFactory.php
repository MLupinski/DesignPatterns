<?php

declare(strict_types=1);

namespace App\Factory\Handlers;

use App\Command\Handlers\CreateUserHandler;
use App\Command\Handlers\DeleteUserHandler;
use App\Factory\Interface\Handlers;

class DeleteUserHandlerFactory implements Handlers
{
    public function __construct(private readonly string $instanceNamespace = 'App\Model\User')
    {
        
    }
    public function create()
    {
        return new DeleteUserHandler(new $this->instanceNamespace());
    }
}