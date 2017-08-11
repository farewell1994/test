<?php

use Test\Core\Route;
use Pimple\Container;

/**
 * Pimple container
 */
$container = new Container();
foreach ($providers as $class) {
    $container->register(new $class());
}
Route::start($_SERVER['REQUEST_URI'], $uriSegment, $routesArray, $container);
