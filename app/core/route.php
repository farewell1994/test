<?php 
class Route
{	
	static function start()
	{
		$defaultController = 'Main';//контроллер по замовчуванню
		$defaultAction = 'index';//action по замовчуванню

		$routes = explode('/', $_SERVER['REQUEST_URI']); 
		
		if ( !empty($routes[2]) ) //в продакшн зменшити ключі масиву на 1(!)
		{	
			$defaultController = $routes[2];//отримуємо з адреси контролер
		}
		
		if ( !empty($routes[3]) )
		{
			$defaultAction = $routes[3];//отримуємо з адреси action
		}
        
		//інклюдим потрібні файли
		$model_file = ucfirst(strtolower($defaultController)).'Model.php';
		$model_path = "app/model/".$model_file;
		if(file_exists($model_path))
		{
			include "app/model/".$model_file;
		}

		$controller_file = ucfirst(strtolower($defaultController)).'Controller.php';
		$controller_path = "app/controller/".$controller_file;
		if(file_exists($controller_path)) 
		{
			include "app/controller/".$controller_file;
		}
		else //якщо не існує запрошеного контролера то вертаємо 404 помилку
		{
			Route::error();
		}
	
		$controller = new $controllerName;
		$action = $actionName;
		
		if(method_exists($controller, $action))
		{
			$controller->$action(); //виконується action, або якщо його не існує 404 помилка
		}
		else
		{
			Route::error();
		}
	
	}
	
	function error() //редиректимся і показуємо 404 помилку
	{
        $adress = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$adress.'404');
    }
}