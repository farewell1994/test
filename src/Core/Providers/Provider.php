<?php
namespace Test\Core\Providers;

use Pimple\Container;

abstract class Provider
{
    public $container;
    public function __construct()
    {
        $this->container = new Container();
    }
}
