<?php
namespace Test\Core;

use Pimple\Container;

/**
 * Class for determining the action, depending on the received URI
 */
class Route
{
    /**
     * @var array of all existing URI
     */
    private static $routes;

    /**
     * This method compares the received address with the existing addresses.
     * In case of coincidence, the method of a certain controller is executed,
     * otherwise the redirect to the page with an error message
     *
     * @param $path Requested URI
     * @param $uriSegment Parametr in URI
     * @param $routesArray array of all existing URI
     */
    public static function start($path, $uriSegment, $routesArray)
    {
        self::$routes = $routesArray;
        /**
         * @var integer counter of addresses
         */
        $counter = 0;
        foreach (self::$routes as $key => $value) {
            $counter++;
            if ($path == $key) {
                /**
                 * @var object. Container for dependency injection
                 */
                $container = new Container();
                $container['db'] = function ($c) {
                    return new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                };
                $container['view'] = function ($c) {
                    return new View();
                };
                /**
                 * @var string
                 */
                $modelName = '\\Test\\Model\\' . $value['model'];
                /**
                 * @var string
                 */
                $controllerName = '\\Test\\Controller\\' . $value['controller'];
                /**
                 * @var string
                 */
                $actionName = $value['action'];
                $container['model'] = function ($c) use ($modelName) {
                    return new $modelName($c['db']);
                };
                $container['controller'] = function ($c) use ($controllerName) {
                    return new $controllerName($c['model'], $c['view']);
                };
                $container['controller']->$actionName($uriSegment);
                break;
            }
            if ($counter == count(self::$routes)) {
                header('Location: /test/error');
            }
        }
    }
}
