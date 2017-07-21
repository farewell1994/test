<?php 
class Route
{
    /**
     *
     */
    static function start($enviroment)
	{
		$defaultController = 'Main';//контроллер по замовчуванню
		$defaultAction = 'index';//action по замовчуванню
		$someValue = null;

		$routes = explode('/', $_SERVER['REQUEST_URI']); 
		
		if ( !empty($routes[1+$enviroment]) ){
			$defaultController = $routes[1+$enviroment];//отримуємо з адреси контролер
		}
		if ( !empty($routes[2+$enviroment]) ){
			$defaultAction = $routes[2+$enviroment];//отримуємо з адреси action
		}
		if (!empty($routes[3+$enviroment])){
			$someValue = strtolower($routes[3+$enviroment]);
		}
        
		//зклеюємо імена контролерів\моделів.екшнів 
		$modelName = ucfirst(strtolower($defaultController)).'Model'; 
 		$controllerName = ucfirst(strtolower($defaultController)).'Controller';
		$actionName = strtolower($defaultAction).'Action';
		
		//інклюдим потрібні файли
		$modelFile = $modelName.'.php';
		//$modelPath = "app/model/".$modelFile;
		$modelPath = "app/model/MainModel.php";
		if(file_exists($modelPath))
		{
			include ($modelPath);
		}

		$controllerFile = $controllerName.'.php';
		$controllerPath = "app/controller/".$controllerFile;
		if(file_exists($controllerPath)) 
		{
			include ($controllerPath);
		}
		else //якщо не існує запрошеного контролера то вертаємо 404 помилку
		{
			Route::error();
		}
	
		$controller = new $controllerName;
		$action = $actionName;
		
		if(method_exists($controller, $action))
		{
			$controller->$action($someValue); //виконується action, або якщо його не існує 404 помилка
		}
		else
		{
			Route::error();
		}
	
	}

    /**
     *
     */
    function error() //редиректимся і показуємо 404 помилку
	{
        $adress = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$adress.'404');
    }
}