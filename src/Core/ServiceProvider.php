<?php

namespace Test\Core;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple->register ( new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS ));
        $pimple->register( new View(new \Twig_Environment(new \Twig_Loader_Filesystem('src/View'))));

    }
}
