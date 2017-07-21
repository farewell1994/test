<?php
class MainController extends Controller
{
    /**
     * @param null $someValue
     */
    function indexAction($uriSegment = null)
	{	
		$data = $this->model->getInfo();
		$this->view->show('indexView.php', $data);
	}

    /**
     * @param null $someValue
     */
    function deleteAction($uriSegment = null){
		$this->model->deleteInfo($uriSegment);
		header('Location: http://localhost/test');
	}
    /**
     * @param $someValue
     */
    function addAction($uriSegment){
        $data=null;
        if($uriSegment!=null){
            $data = $this->model->addInfo($_POST['name'], $_POST['age']);
            header('Location: http://localhost/test');
        }
        $this->view->show('addView.php', $data);
    }
    function editAction($uriSegment){
        if($uriSegment=='ok'){
            $query = $this->model->editInfo($_POST);
            header('Location: http://localhost/test');
        }
        else {
            $data = explode('-', $uriSegment);
        }
        $this->view->show('editView.php', $data);
    }
}