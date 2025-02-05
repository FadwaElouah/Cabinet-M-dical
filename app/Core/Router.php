<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function addRoute($method, $path, $handler)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                list($controller, $method) = explode('@', $route['handler']);
                $controllerClass = "App\\Controllers\\{$controller}";
                $controllerInstance = new $controllerClass();
                $controllerInstance->$method();
                return;
            }
        }

        // Route non trouvée
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}

