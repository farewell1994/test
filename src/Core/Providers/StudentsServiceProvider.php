<?php

namespace Test\Core\Providers;

use Pimple\Container;
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
            return new \Test\Models\Students($c['\PDO']);
        };
        return $pimple;
    }
}
