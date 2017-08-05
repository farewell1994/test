<?php

namespace Test\Core;
use Test\Model\InfoModel;
use Test\Controller\StudentController;
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
            return new View(new \Twig_Environment(new \Twig_Loader_Filesystem(TEMPLATES)));
        };
        $pimple['InfoModel'] = function ($c) {
            return new InfoModel(new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS));
        };
        $pimple['StudentController'] = function ($c) {
            return new StudentController($c['InfoModel'], $c['View']);
        };
        return $pimple;
    }
}
