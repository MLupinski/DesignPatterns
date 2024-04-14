<?php

declare(strict_types = 1);

namespace App\Command\Interface;

interface CommandBusInterface
{
    public function registerHandlers(): void;

    public function handle($command): void;
}