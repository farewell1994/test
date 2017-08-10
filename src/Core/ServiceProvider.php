<?php

namespace Test\Core;

use Test\Model\Students;
use Test\Controller\StudentController;
use Test\Model\Books;
use Test\Controller\BookController;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**This class returns services
 *
 * Class ServiceProvider
 * @package Test\Core
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['View'] = function ($c) {
            return new View(new \Twig_Environment(new \Twig_Loader_Filesystem('src/View')));
        };
        $pimple['Students'] = function ($c) {
            return new Students(new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS));
        };
        $pimple['Books'] = function ($c) {
            return new Books(new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS));
        };
        $pimple['StudentController'] = function ($c) {
            return new StudentController($c['Students'], $c['Books'], $c['View']);
        };
        $pimple['BookController'] = function ($c) {
            return new BookController($c['Students'], $c['Books'], $c['View']);
        };
        return $pimple;
    }
}
