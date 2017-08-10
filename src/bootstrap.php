<?php

use Test\Core\Route;
use Test\Core\ServiceProvider;
use Pimple\Container;

/**
 * Pimple container
 */
$container = new Container();
$ServiceProvider = new ServiceProvider();
$objects = $ServiceProvider->register($container);
/**
 * @var array Requested URI
 */
$uriArray = explode('/', $_SERVER['REQUEST_URI']);
if (count($uriArray) == 5) {
    /**
     * @var string URI parameter
     */
    $uriSegment = $uriArray[4];
} else {
    $uriSegment = null;
}
require_once 'Config/routes.php';
Route::start($_SERVER['REQUEST_URI'], $uriSegment, $routesArray, $objects);
