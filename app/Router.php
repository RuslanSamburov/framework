<?php

namespace App;

use App\Framework\Application;
use App\Framework\Attributes\Route;
use App\Framework\Exceptions\RouteNotFound;
use ReflectionClass;

class Router
{
    protected $routes = [];

    public function loadRoutes()
    {
        $controllers = glob(Application::getConfigure()['controller']['base_path'] . '*.php');

        foreach ($controllers as $controllerFile) {
            $controllerClass = Application::getConfigure()['controller']['namespace'] . basename($controllerFile, '.php');

            if (!class_exists($controllerClass))
            {
                continue;
            }

            $controller = new $controllerClass;
            $methods = (new ReflectionClass($controller))->getMethods();

            foreach ($methods as $method) {
                $attributes = $method->getAttributes(Route::class);

                foreach ($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->routes[$route->route][$route->method] = [
                        'controller' => $controllerClass,
                        'action' => $method->name,
                    ];
                }
            }
        }
    }

    public function dispatch(string $uri, string $requestMethod)
    {
        if (isset($this->routes[$uri][$requestMethod]))
        {
            $route = $this->routes[$uri][$requestMethod];

            $controllerName = $route['controller'];
            $action = $route['action'];

            $controller = new $controllerName();
            $controller->$action();
            
        } else {
            throw new RouteNotFound();
        }
    }
}
