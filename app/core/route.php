<?php 
class Route
{
    /**
     *
     */
    static public function start()
	{
		$defaultController = 'Main';//контроллер по замовчуванню
		$defaultAction = 'index';//action по замовчуванню
		$uriSegment = null;
		$routes = explode('/', $_SERVER['REQUEST_URI']); 
		
		if ( !empty($routes[2]) ){
			$defaultController = $routes[2];//отримуємо з адреси контролер
		}
		if ( !empty($routes[3]) ){
			$defaultAction = $routes[3];//отримуємо з адреси action
		}
		if (!empty($routes[4])){
            $uriSegment = strtolower($routes[4]);
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

		$needModel = new MainModel();
		$needView = new View();
		$controller = new $controllerName($needModel, $needView);
		$action = $actionName;
		
		if(method_exists($controller, $action))
		{
			$controller->$action($uriSegment); //виконується action, або якщо його не існує 404 помилка
		}
		else
		{
			Route::error();
		}
	
	}

    /**
     *
     */
    private function error() //редиректимся і показуємо 404 помилку
	{
        $adress = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$adress.'404');
    }
}