<?php

namespace Test\Core\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**This class has method that returns service
 *
 * Class BookControllerServiceProvider
 * @package Test\Core\Providers
 */
class BookControllerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['Test\Controllers\BookController'] = function ($c) {
            return new \Test\Controllers\BookController($c['Test\Models\Students'], $c['Test\Models\Books'], $c['Test\Core\View']);
        };
        return $pimple;
    }
}
-