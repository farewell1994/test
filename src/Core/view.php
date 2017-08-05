<?php
namespace Test\Core;

use Twig\Autoloader;

/**
 * Class View This class include needed views
 * @package Test\Core
 */
class View
{
    private $twig;
    function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }
    /**
     * @param string $content Path to view
     * @param null $data Array of data
     */
    public function show($content, $data = null)
    {
        echo $this->twig->render($content, array('data' => $data));
    }
}
