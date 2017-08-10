<?php

namespace Test\Core;

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
        $pimple['Test\Core\View'] = function ($c) {
            return new View(new \Twig_Environment(new \Twig_Loader_Filesystem('src/Views')));
        };
        $pimple['Test\Models\Students'] = function ($c) {
            return new \Test\Models\Students(new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS));
        };
        $pimple['Test\Models\Books'] = function ($c) {
            return new \Test\Models\Books(new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS));
        };
        $pimple['Test\Controllers\StudentController'] = function ($c) {
            return new \Test\Controllers\StudentController($c['Test\Models\Students'], $c['Test\Models\Books'], $c['Test\Core\View']);
        };
        $pimple['Test\Controllers\BookController'] = function ($c) {
            return new \Test\Controllers\BookController($c['Test\Models\Students'], $c['Test\Models\Books'], $c['Test\Core\View']);
        };
        return $pimple;
    }
}
