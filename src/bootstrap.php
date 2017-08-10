<?php

use Test\Core\Route;
use Pimple\Container;

/**
 * Pimple container
 */
$container = new Container();
foreach (require_once 'Config/providers.php' as $class) {
    $container->register(new $class());
}
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
Route::start($_SERVER['REQUEST_URI'], $uriSegment, require_once 'Config/routes.php', $container);
