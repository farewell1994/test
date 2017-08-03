<?php
namespace Test\Core;

class View
{
    /**
     * @param $content
     * @param null $data
     */
    public function show($content, $data = null)
    {
        include "src/view/".$content;
    }
}
