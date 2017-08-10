<?php
    /**
     * @var array. Array of all existing addresses.
     * Key is an address, value is a controller, model and action that are associated with that address
     */
$routesArray = array(
    '/test/' => array('controller' => 'StudentController', 'action' => 'showAction'),
    '/test/student/add' => array('controller' => 'StudentController', 'action' => 'addAction'),
    '/test/student/edit/'.$uriSegment => array('controller' => 'StudentController', 'action' => 'editAction'),
    '/test/student/delete/'.$uriSegment => array('controller' => 'StudentController', 'action' => 'deleteAction'),
    '/test/books' => array('controller' => 'BookController', 'action' => 'showBookAction'),
    '/test/books/add' => array('controller' => 'BookController', 'action' => 'addBookAction'),
    '/test/books/delete/'.$uriSegment => array('controller' => 'BookController', 'action' => 'deleteBookAction'),
    '/test/books/edit/'.$uriSegment => array('controller' => 'BookController', 'action' => 'editBookAction'),
    '/test/books/bind/'.$uriSegment => array('controller' => 'BookController', 'action' => 'bindAction'),
    '/test/book/unbind/'.$uriSegment => array('controller' => 'BookController', 'action' => 'unbindAction'),
);
