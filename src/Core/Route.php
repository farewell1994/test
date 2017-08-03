<?php
namespace Test\Core;

use Pimple\Container;

class Route
{
    private static $routes;
    public static function start($path, $uriSegment, $routesArray)
    {
        self::$routes = $routesArray;
        $counter = 0;
        foreach (self::$routes as $key => $value) {
            $counter++;
            if ($path == $key) {
                $container = new Container();
                $container['db'] = function ($c) {
                    return new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                };
                $container['view'] = function ($c) {
                    return new View();
                };
                $modelName = '\\Test\\Model\\' . $value['model'];
                $controllerName = '\\Test\\Controller\\' . $value['controller'];
                $actionName = $value['action'];
                $container['model'] = function ($c) use ($modelName) {
                    return new $modelName($c['db']);
                };
                $container['controller'] = function ($c) use ($controllerName) {
                    return new $controllerName($c['model'], $c['view']);
                };
                $controller = $container['controller'];
                $controller->$actionName($uriSegment);
                break;
            }
            if ($counter == count(self::$routes)) {
                header('Location: /test/error');
            }
        }
    }
}
