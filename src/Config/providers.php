<?php

/**
 * @var array. Array of all existing providers
 */
return $providers = array(
    'View' => '\Test\Core\Providers\ViewServiceProvider',
    'PDO' => '\Test\Core\Providers\PDOServiceProvider',
    'Books' => '\Test\Core\Providers\BooksServiceProvider',
    'Students' => '\Test\Core\Providers\StudentsServiceProvider',
    'StudentController' => '\Test\Core\Providers\StudentControllerServiceProvider',
    'BookController' => '\Test\Core\Providers\BookControllerServiceProvider',
);
