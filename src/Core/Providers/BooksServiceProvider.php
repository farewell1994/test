<?php

namespace Test\Core\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**This class has method that returns service
 *
 * Class BooksServiceProvider
 * @package Test\Core\Providers
 */
class BooksServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['Test\Models\Books'] = function ($c) {
            return new \Test\Models\Books($c['\PDO']);
        };
        return $pimple;
    }
}

