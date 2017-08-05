<?php

namespace Test\Core;

/**
 * Class View This class renders needed views
 * @package Test\Core
 */
class View
{
    /**
     * @var \Twig_Environment
     */
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
