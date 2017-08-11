<?php

namespace Test\Core\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**This class has method that returns service
 *
 * Class StudentControllerServiceProvider
 * @package Test\Core\Providers
 */
class StudentControllerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['Test\Controllers\StudentController'] = function ($c) {
            return new \Test\Controllers\StudentController($c['Test\Models\Students'], $c['Test\Models\Books'], $c['Test\Core\View']);
        };
        return $pimple;
    }
}
