<?php
namespace Test\Core;

use Twig\Autoloader;

/**
 * Class View This class include needed views
 * @package Test\Core
 */
class View
{
    /**
     * @param string $content Path to view
     * @param null $data Array of data
     */
    public function show($content, $data = null)
    {
        include "src/view/".$content;
    }
}
