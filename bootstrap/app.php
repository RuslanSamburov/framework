<?php

use App\Framework\Application;
use App\Router;

require_once 'helpers.php';

Application::configure(path_app('Controllers/'), 'App\\Controllers\\');

$router = new Router();

$router->loadRoutes();

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
