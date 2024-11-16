<?php

namespace App\Framework\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]

class Route
{
    public function __construct(
        public string $route,
        public string $method,
    )
    {
        
    }
}
