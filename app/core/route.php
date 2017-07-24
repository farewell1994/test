<?php 
class Route
{
    /**
     *
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
        header('Location: error/page');
    }
}