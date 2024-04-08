<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\View;

class HomeController
{
    public function index()
    {
       return new View('home/index.phtml');
    }
}