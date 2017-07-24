<?php
class MainController extends Controller
{
    /**
     * @param null $uriSegment
     */
    public function indexAction($uriSegment = null)
    {
        $data = $this->model->getInfo();
        $this->view->show('indexView.php', $data);
    }

    /**
     * @param null $uriSegment
     */
    public function deleteAction($uriSegment = null)
    {
        $this->model->deleteInfo($uriSegment);
        header('Location: http://localhost/test');
    }

    /**
     * @param $uriSegment
     */
    public function addAction($uriSegment)
    {
        $data=null;
        if ($uriSegment!=null) {
            $data = $this->model->addInfo($_POST['name'], $_POST['age']);
            header('Location: http://localhost/test');
        }
        $this->view->show('addView.php', $data);
    }

    /**
     * @param $uriSegment
     */
    public function editAction($uriSegment)
    {
        if ($uriSegment=='ok') {
            $query = $this->model->editInfo($_POST);
            header('Location: http://localhost/test');
        } else {
            $data = explode('-', $uriSegment);
        }
        $this->view->show('editView.php', $data);
    }

    /**
     *
     */
    public function errorAction()
    {
        $this->view->show('errorView.php');
    }
}