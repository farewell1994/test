<?php

namespace Test\Core\Providers;

use Pimple\Container;
use Test\Config\DBConfig;
use Pimple\ServiceProviderInterface;

/**This class has method that returns service
 *
 * Class StudentsServiceProvider
 * @package Test\Core\Providers
 */
class StudentsServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['Test\Models\Students'] = function ($c) {
            return new \Test\Models\Students(new \PDO('mysql:host=' . DBConfig::$dbConfig['host'] . ';dbname=' . DBConfig::$dbConfig['database'], DBConfig::$dbConfig['user'], DBConfig::$dbConfig['pass']));
        };
        return $pimple;
    }
}
