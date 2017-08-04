<?php

namespace Test\Core\Providers;

class ControllerProvider extends Provider
{
    public static function register($controllerName){
        $container['controller'] = function ($c) use ($controllerName) {
            return new $controllerName($c['model'], $c['view']);
        };
    }
}
