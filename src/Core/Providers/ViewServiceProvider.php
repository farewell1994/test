<?php

namespace Test\Core\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**This class has method that returns service
 *
 * Class ViewServiceProvider
 * @package Test\Core\Providers
 */
class ViewServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {

        $pimple['Test\Core\View'] = function ($c) {
            return new \Test\Core\View(new \Twig_Environment(new \Twig_Loader_Filesystem('src/Views')));
        };
        return $pimple;
    }
}

