<?php

declare(strict_types=1);

use App\Command\CommandBus;
use App\Controller\FrontController;

require_once 'vendor/autoload.php';

$commandBus = CommandBus::getInstance();
$commandBus->registerHandlers();
$controller = new FrontController();
$controller->run();
