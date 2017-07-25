<?php 
class Route
{
    /**
     * @param string $controller
     * @param string $action
     * @param null $uriSegment
     */
    public static function start($controller = "MainController", $action = "indexAction", $uriSegment = null)
    {
        if (method_exists($controller, $action)) {
            $controller->$action($uriSegment);
        } else {
            Route::error();
        }
    }
    /**
     *
     */
    public static function error() //редиректимся і показуємо  помилку
    {
        header('Location: http://localhost/test/main/error');
    }
}