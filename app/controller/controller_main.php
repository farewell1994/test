<?php
class Controller_Main extends Controller
{
	function action_index()
	{	
		$this->view->show('index_view.php');
	}
}