<?php 
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
		include "app/view/".$content;
	}
}