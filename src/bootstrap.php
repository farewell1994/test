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
/**
 * @param string $uriSegment. Determined in the src/Config/uri.php file.
 * @param array $routesArray. Determined in the src/Config/routes.php file.
 */
Route::start($_SERVER['REQUEST_URI'], $uriSegment, $routesArray, $container);
