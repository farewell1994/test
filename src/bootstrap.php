<?php
use Pimple\Container;
use Test\Core\View;
use Test\Core\Route;

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
if (isset($routes[5])) {
    Route::error();
}
$controllerName = '\\Test\\Controller\\'.ucfirst(strtolower($DefaultController)).'Controller';
$controllerPath = 'src/controller/'.$DefaultController.'Controller.php';
$modelPath = 'src/model/'.ucfirst(strtolower($DefaultController)).'Model.php';
$modelName = '\\Test\\Model\\'.ucfirst(strtolower($DefaultController)).'Model';
if (file_exists($modelPath)) {
    include ($modelPath);
}
if (file_exists($controllerPath)) {
    include ($controllerPath);
} else {
    Route::error();
}
$actionName = strtolower($DefaultAction).'Action';

$container = new Container();
$container['db'] = function($c) {
    return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
};
$container['view'] = function($c) {
    return new View();
};
$container['model'] = function($c) use ($modelName) {
    return new $modelName($c['db']);
};
$container['controller'] = function($c) use ($controllerName){
    return new $controllerName($c['model'], $c['view']);
};
$controller = $container['controller'];
Route::start($controller, $actionName, $uriSegment);

