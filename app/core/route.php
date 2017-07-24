<?php 
class Route
{
    /**
     *
     */
    static public function start($controller = "MainController", $action = "indexAction", $uriSegment = null)
	{
		if(method_exists($controller, $action)) {
			$controller->$action($uriSegment);
		}
		else {
			Route::error();
		}
	}
    /**
     *
     */
    static public function error() //редиректимся і показуємо  помилку
	{
        header('Location: error/page');
    }
}