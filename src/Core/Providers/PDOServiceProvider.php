<?php

namespace Test\Core\Providers;

use Pimple\Container;
use Test\Config\DBConfig;
use Pimple\ServiceProviderInterface;

/**This class has method that returns service
 *
 * Class PDOServiceProvider
 * @package Test\Core\Providers
 */
class PDOServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['\PDO'] = function ($c) {
            return new \PDO('mysql:host=' . DBConfig::$dbConfig['host'] . ';dbname=' . DBConfig::$dbConfig['database'], DBConfig::$dbConfig['user'], DBConfig::$dbConfig['pass']);
        };
        return $pimple;
    }
}
-