<?php 
class View
{	
    //$content - представлення що відобразиться
	//$data - дані які передати в представлення
	function show($content, $data = null)
	{
		include "app/view/".$content;
	}
}