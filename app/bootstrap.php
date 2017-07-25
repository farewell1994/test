<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'core/helper.php';
$routes = explode('/', $_SERVER['REQUEST_URI']);
if (!empty($routes[2])) {
    $DefaultController = $routes[2];
}
if (!empty($routes[3])) {
    $DefaultAction = $routes[3];
}
if (!empty($routes[4])) {
    $uriSegment = strtolower($routes[4]);
}
$controllerName = ucfirst(strtolower($DefaultController)).'Controller';
$controllerPath = 'app/controller/'.$DefaultController.'Controller.php';
$modelPath = 'app/model/'.ucfirst(strtolower($DefaultController)).'Model.php';
if (file_exists($modelPath)) {
    include ($modelPath);
}
if (file_exists($controllerPath)) {
    include ($controllerPath);
} else {
    Route::error();
}
$actionName = strtolower($DefaultAction).'Action';

$needModel = new MainModel($db);
$needView = new View();
$controller = new $controllerName($needModel, $needView);
Route::start($controller, $actionName, $uriSegment);

