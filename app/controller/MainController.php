<?php
class MainController extends Controller
{
	function indexAction($someValue = null)
	{	
		$data = $this->model->getInfo();
		$this->view->show('indexView.php', $data);
	}
	function deleteAction($someValue = null){
		$this->model->deleteInfo($someValue);
		header('Location: http://localhost/test');
	}
}