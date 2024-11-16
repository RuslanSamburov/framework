<?php

if (file_exists($laradd = __DIR__ . '/../vendor/larapack/dd/src/helper.php')) 
{
    require $laradd;
}

if (!function_exists('path')) 
{
    function path(string $path): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $path;
    }
}

if (!function_exists('path_app')) 
{
    function path_app(string $app): string
    {
        return path('app' . DIRECTORY_SEPARATOR . $app);
    }
}

if (!function_exists('getenv')) 
{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    function getenv(string $key, mixed $default = null) 
    {
        return $_ENV[$key] ?? $default;
    }
}
