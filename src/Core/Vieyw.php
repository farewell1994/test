<?php

namespace Test\Core;

/**
 * Class View This class has method for rendering needed views
 * @package Test\Core
 */
class View
{
    /**
     * @var \Twig_Environment
     */
    private $twig;
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }
    /**
     * This method renders a view
     * @param string $content Path to view
     * @param null $data Array of data
     */
    public function show($content, $data = null)
    {
        echo $this->twig->render($content, array('data' => $data));
    }
}
