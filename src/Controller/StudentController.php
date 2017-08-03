<?php
namespace Test\Controller;
use Test\Core\Controller;

class StudentController extends Controller
{
    /**
     * @param null $uriSegment
     */
    public function indexAction()
    {
        $data = $this->model->getInfo();
        $this->view->show('indexView.php', $data);
    }

    /**
     * @param null $uriSegment
     */
    public function deleteAction($uriSegment)
    {
        $result = $this->model->deleteInfo($uriSegment);
        if ($result == 1) {
            header('Location: /test');
        } else {
            $data = 'Student not found';
            $this->view->show('validateView.php', $data);
        }
    }

    /**
     * @param $uriSegment
     */
    public function addAction()
    {
        $data = null;
        if ($_POST) {
            $data = $this->model->addInfo($_POST['name'], $_POST['age']*1);
            if ($data == 1) {
                header('Location: /test');
            } else {
                $data = 'Incorrect data';
            }
        }
        $this->view->show('addView.php', $data);
    }
    /**
     * @param $uriSegment
     */
    public function editAction($uriSegment)
    {
        $data[0] = null;
        if (!$_POST) {
            $data[1] = explode('-', $uriSegment);
            $this->view->show('editView.php', $data);
        } elseif ($_POST) {
            $result = $this->model->editInfo($_POST);
            if ($result == 1) {
                header('Location: /test');
            } else {
                $data[0] = 'Incorrect data';
                $data[1] = array_values($_POST);
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
