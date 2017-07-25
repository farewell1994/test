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
        $result = $this->model->deleteInfo($uriSegment);
        if ($result == 1) {
            header('Location: http://localhost/test');
        } else {
            echo "<script type='text/javascript'>alert('Student not found');
            window.location.href='http://localhost/test'</script>";
        }
    }

    /**
     * @param $uriSegment
     */
    public function addAction($uriSegment)
    {
        $data=null;
        if ($uriSegment!=null) {
            $data = $this->model->addInfo($_POST['name'], $_POST['age']*1);
            if ($data == 1) {
                header('Location: http://localhost/test');
            } else {
                echo "<script type='text/javascript'>alert('Incorrect data');
                window.location.href='http://localhost/test/main/add'</script>";
            }
        }
        $this->view->show('addView.php', $data);
    }

    /**
     * @param $uriSegment
     */
    public function editAction($uriSegment)
    {
        if ($uriSegment!='ok') {
            $data = explode('-', $uriSegment);
            $this->view->show('editView.php', $data);
        } elseif ($uriSegment == 'ok') {
            $result = $this->model->editInfo($_POST);
            if ($result == 1) {
                header('Location: http://localhost/test');
            } else {
                echo "<script type='text/javascript'>alert('Incorrect data')</script>";
                $data = array_values($_POST);
                $this->view->show('editView.php', $data);
            }
        }

    }

    /**
     *
     */
    public function errorAction()
    {
        $this->view->show('errorView.php');
    }
}