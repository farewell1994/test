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
/**
 * @var array. Array of all existing addresses.
 * Key is an address, value is a controller, model and action that are associated with that address
 */
$routesArray = array(
    '/test/' => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'showAction'),
    '/test/main/add' => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'addAction'),
    '/test/main/edit/'.$uriSegment => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'editAction'),
    '/test/main/delete/'.$uriSegment => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'deleteAction'),
    '/test/error' => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'errorAction')
);
Route::start($_SERVER['REQUEST_URI'], $uriSegment, $routesArray, $objects);
