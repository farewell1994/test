<?php

namespace Test\Core;

use Test\Model\InfoModel;
use Test\Controller\StudentController;
use Test\Model\BooksModel;
use Test\Controller\BookController;
use Test\Controller\ErrorController;
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
        $pimple['InfoModel'] = function ($c) {
            return new InfoModel(new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS));
        };
        $pimple['BooksModel'] = function ($c) {
            return new BooksModel(new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS));
        };
        $pimple['StudentController'] = function ($c) {
            return new StudentController($c['InfoModel'], $c['BooksModel'], $c['View']);
        };
        $pimple['BookController'] = function ($c) {
            return new BookController($c['InfoModel'], $c['BooksModel'], $c['View']);
        };
        return $pimple;
    }
}
