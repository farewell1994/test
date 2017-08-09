<?php

$uriSegment = null;
/**
 * @var array. Array of all existing addresses.
 * Key is an address, value is a controller, model and action that are associated with that address
 */
$routesArray = array(
    '/test/' => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'showAction'),
    '/test/student/add' => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'addAction'),
    '/test/student/edit/'.$uriSegment => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'editAction'),
    '/test/student/delete/'.$uriSegment => array('controller' => 'StudentController', 'model' => 'InfoModel', 'action' => 'deleteAction'),
    '/test/books' => array('controller' => 'BookController', 'model' => 'BooksModel', 'action' => 'showBookAction'),
    '/test/books/add' => array('controller' => 'BookController', 'model' => 'BooksModel', 'action' => 'addBookAction'),
    '/test/books/delete/'.$uriSegment => array('controller' => 'BookController', 'model' => 'BooksModel', 'action' => 'deleteBookAction'),
    '/test/books/edit/'.$uriSegment => array('controller' => 'BookController', 'model' => 'BookModel', 'action' => 'editBookAction')
);