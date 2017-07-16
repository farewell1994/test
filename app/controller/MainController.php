<?php
class MainController extends Controller
{
	function indexAction()
	{	
   		$this->model = new MainModel();
		$data = $this->model->getTable();
		$this->view->show('indexView.php', $data);
	}
}