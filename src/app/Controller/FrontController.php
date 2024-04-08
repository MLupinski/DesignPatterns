<?php

declare(strict_types=1);

namespace App\Controller;

class FrontController
{
    private const string CONTROLLER_NAMESPACE = 'App\Controller\\';
    private string $controller = self::CONTROLLER_NAMESPACE . 'HomeController';
    private string $action = 'index';
    private array $params = [];

    public function __construct()
    {
        $serverRequest = $this->parseUri();
        if ($_SERVER['REQUEST_URI'] !== '/') {
            $this->controller = self::CONTROLLER_NAMESPACE . ucwords($serverRequest['controller']) . 'Controller';
            if (isset($serverRequest['action']) && $serverRequest['action'] !== "") {
                $this->action = $serverRequest['action'];
            }
        }
    }

    /**
     * @return void
     */
    public function run(): void
    {
        call_user_func_array([new $this->controller, $this->action], $this->params);
    }

    /**
     * @return array
     */
    private function parseUri(): array
    {
        $params = [];
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri === '/') {
            return [];
        }

        $uri = parse_url(ltrim($uri, '/'));
        list($controller, $action) = explode('/', $uri['path']);
        if (isset($uri['query'])) {
            $params = explode('&', $uri['query']);
        }

        return ['controller' => $controller, 'action' => $action, 'params' => $params];
    }
}