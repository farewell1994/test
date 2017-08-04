<?php
namespace Test\Core;

use Twig\Autoloader;

/**
 * Class View This class include needed views
 * @package Test\Core
 */
class View
{
    public $loader;
    public $twig;
    public $template;
    function __construct()
    {
        \Twig_Autoloader::register();
        $this->loader = new \Twig_Loader_Filesystem('src/View');
        $this->twig = new \Twig_Environment($this->loader);
    }
    /**
     * @param string $content Path to view
     * @param null $data Array of data
     */
    public function show($content, $data = null)
    {
           // echo $this->twig->render($content, array('data' => $data));
            include "src/view/" . $content;
    }
}
