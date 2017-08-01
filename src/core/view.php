<?php
namespace Test\Core;

class View
{
    //$content - представлення що відобразиться
	//$data - дані які передати в представлення
    /**
     * @param $content
     * @param null $data
     */
    public function show($content, $data = null)
    {
        include "src/view/".$content;
    }
}