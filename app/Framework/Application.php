<?php

namespace App\Framework;

class Application
{
    private static array $appConfig = [];

    public static function configure(string $pathControllers, string $namespaceControllers)
    {
        self::$appConfig = [
            'controller' => [
                'base_path' => $pathControllers,
                'namespace' => $namespaceControllers,
            ]
        ];
    }

    public static function getConfigure(): array
    {
        return self::$appConfig;
    }
}
