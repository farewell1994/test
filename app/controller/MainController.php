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
    /**
     * @param $someValue
     */
    function addAction($someValue){
        $data=null;
        if($someValue!=null){
            $data = $this->model->addInfo($_POST['name'], $_POST['age']);
        }
        $this->view->show('addView.php', $data);
    }
    function editAction($someValue){
        $data = null;
        $this->view->show('addView.php', $data);
    }
}