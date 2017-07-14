<?php
class MainController extends Controller
{
	function indexAction()
	{	
		$this->view->show('indexView.php');
	}
}