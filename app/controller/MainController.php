<?php
class MainController extends Controller
{
    /**
     * @param null $someValue
     */
    function indexAction($someValue = null)
	{	
		$data = $this->model->getInfo();
		$this->view->show('indexView.php', $data);
	}

    /**
     * @param null $someValue
     */
    function deleteAction($someValue = null){
		$this->model->deleteInfo($someValue);
		header('Location: http://localhost/test');
	}
}