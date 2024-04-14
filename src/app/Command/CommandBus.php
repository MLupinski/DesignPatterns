<?php

declare(strict_types=1);

namespace App\Command;

use App\Command\Interface\CommandBusInterface;

class CommandBus implements CommandBusInterface
{
    private static CommandBus|null $instance = null;
    private array $handlers = [];
    private array $excludedFiles = ['.', '..', 'Interface', 'Handlers', 'CommandBus.php'];

    private string $handlersNamespace = 'App\\Factory\\Handlers\\';
    private string $commandNamespace = 'App\\Command\\';

    /**
     * @return CommandBus|null
     */
    public static function getInstance(): ?CommandBus
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function handle($command): void
    {
        if (isset($this->handlers[get_class($command)])) {
            $this->handlers[get_class($command)]->create()->handle($command);
        }
    }

    public function registerHandlers(): void
    {
        $files = scandir('app/Command');
        foreach ($files as $file) {
            if (in_array($file, $this->excludedFiles)) {
                continue;
            }

            $className = $this->handlersNamespace . str_replace('.php', '', $file) . 'HandlerFactory';
            $this->handlers[$this->commandNamespace . str_replace('.php', '', $file)] = new $className();
        }
    }
}
