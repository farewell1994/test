<?php

namespace Test\Core\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**This class returns services
 *
 * Class ServiceProvider
 * @package Test\Core
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
