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
if (!empty($uriArray[4])) {
    /**
     * @var string URI parameter
     */
    $uriSegment = strtolower($uriArray[4]);
}
Route::start($_SERVER['REQUEST_URI'], $uriSegment, $routesArray, $objects);
