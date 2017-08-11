<?php

/**
 * @var array. Array of all existing addresses.
 * Key is an address, value is a controller, model and action that are associated with that address
 */
return $routesArray = array(
    '/test/' => array('controller' => 'StudentController', 'action' => 'showStudentsAction'),
    '/test/student/add' => array('controller' => 'StudentController', 'action' => 'addStudentAction'),
    '/test/student/edit/'.$uriSegment => array('controller' => 'StudentController', 'action' => 'editStudentAction'),
    '/test/student/delete/'.$uriSegment => array('controller' => 'StudentController', 'action' => 'deleteStudentAction'),
    '/test/books' => array('controller' => 'BookController', 'action' => 'showBookAction'),
    '/test/books/add' => array('controller' => 'BookController', 'action' => 'addBookAction'),
    '/test/books/delete/'.$uriSegment => array('controller' => 'BookController', 'action' => 'deleteBookAction'),
    '/test/books/edit/'.$uriSegment => array('controller' => 'BookController', 'action' => 'editBookAction'),
    '/test/books/bind/'.$uriSegment => array('controller' => 'BookController', 'action' => 'bindBookAction'),
    '/test/book/unbind/'.$uriSegment => array('controller' => 'BookController', 'action' => 'unbindBookAction'),
);
-