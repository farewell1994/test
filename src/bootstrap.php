<?php

use Test\Core\Route;

$uriArray = explode('/', $_SERVER['REQUEST_URI']);
if (!empty($uriArray[4])) {
    $uriSegment = strtolower($uriArray[4]);
}
$routesArray = array(
    '/test/' => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'indexAction'),
    '/test/main/add' => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'addAction'),
    '/test/main/edit/'.$uriSegment => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'editAction'),
    '/test/main/delete/'.$uriSegment => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'deleteAction'),
    '/test/error' => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'errorAction')
);
Route::start($_SERVER['REQUEST_URI'], $uriSegment, $routesArray);
