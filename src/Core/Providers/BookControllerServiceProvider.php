<?php

namespace Test\Core\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**This class returns services
 *
 * Class ServiceProvider
 * @package Test\Core
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
