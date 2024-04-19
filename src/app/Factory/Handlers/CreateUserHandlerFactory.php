<?php

declare(strict_types=1);

namespace App\Factory\Handlers;

use App\Command\Handlers\CreateUserHandler;
use App\Factory\Interface\Handlers;

class CreateUserHandlerFactory implements Handlers
{
    public function __construct(private readonly string $instanceNamespace = 'App\Model\User')
    {
        
    }
    public function create()
    {
        return new CreateUserHandler(new $this->instanceNamespace());
    }
}