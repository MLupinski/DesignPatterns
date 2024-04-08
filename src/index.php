<?php

declare(strict_types=1);

use App\Controller\FrontController;

require_once 'vendor/autoload.php';

$controller = new FrontController();
$controller->run();
