<?php

declare(strict_types=1);

namespace App\Controller;

class FrontController
{
    private const string CONTROLLER_NAMESPACE = 'App\Controller\\';
    private const string CONTROLLER_FACTORY_NAMESPACE = 'App\Factory\\';
    private string $controller = self::CONTROLLER_NAMESPACE . 'HomeController';
    private array $actions = ['controller' => 'index'];
    private array $params = [];

    public function __construct()
    {
        $serverRequest = $this->parseUri();
        if ($_SERVER['REQUEST_URI'] !== '/') {
            $file = self::CONTROLLER_NAMESPACE . ucwords($serverRequest['controller']) . 'Controller';
            $factoryFile = self::CONTROLLER_FACTORY_NAMESPACE . ucwords($serverRequest['controller']) . 'ControllerFactory';
            if (class_exists($factoryFile)) {
                $this->controller = $factoryFile;
                $this->actions['factory'] = 'create';
                $this->actions['controller'] = $serverRequest['action'] === '' ? 'index' : $serverRequest['action'];
            } else {
                $this->controller = $file;
            }

            if (isset($serverRequest['action']) && $serverRequest['action'] !== '') {
                $this->actions['controller'] = $serverRequest['action'];
            }
        }
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if (isset($this->actions['factory'])) {
            $class = call_user_func_array([new $this->controller, $this->actions['factory']], $this->params);
            $controllerAction = $this->actions['controller'];
            call_user_func_array([$class, $controllerAction], $this->params);
        } else {
            call_user_func_array([new $this->controller, $this->actions['controller']], $this->params);
        }
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
        $uriParams = explode('/', $uri['path']);
        if (isset($uri['query'])) {
            $params = explode('&', $uri['query']);
        }

        return [
            'controller' => $uriParams[0],
            'action' => $uriParams[1] ?? '',
            'params' => $params
        ];
    }
}
