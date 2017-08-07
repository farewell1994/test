<?php
namespace Test\Controller;
use Test\Core\Controller;

/**
 * Class StudentController Controller for working with information about students
 * @package Test\Controller
 */
class StudentController extends Controller
{
    /**
     * This method calls the model method to retrieve all data and a method for showing results
     */
    public function showAction()
    {
        /**
         * @var object. Data about students
         */
        $data = $this->model->getInfo();
        $this->view->show('indexView.php', $data);
    }

    /**
     *This method calls the model method to delete the entry.
     * If the query is successful - redirecting to the main page,
     * otherwise - redirecting to the page with an error
     * @param integer $uriSegment student ID for deletion
     */
    public function deleteAction($uriSegment)
    {
        /**
         * @var integer. Assigned 1 if the query is successful
         */
        $result = $this->model->deleteInfo($uriSegment);
        if ($result == 1) {
            header('Location: /test');
        } else {
            /**
             * @var Data that is sent to the view
             */
            $data = 'Student not found';
            $this->view->show('errorView.php', $data);
        }
    }

    /**
     *This method shows form for adding the entry and calls the model method to add the entry.
     * If the _POST array is empty - showing the form of adding the entry,
     * otherwise we call model method for processing of the received data.
     * If the query is successful - redirecting to the main page,
     * otherwise - redirecting to the page with an error
     */
    public function addAction()
    {
        /**
         * @var Data that is sent to the view
         */
        $data = null;
        if ($_POST) {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->model->addInfo($_POST['name'], $_POST['age']*1);
            if ($result == 1) {
                header('Location: /test');
            } else {
                $data = 'Incorrect data';
            }
        }
        $this->view->show('addView.php', $data);
    }
    /**
     * This method shows form for edit entry and calls model method to edit entry.
     * If array _POST empty - showing form for edit entry. Data for the form is taken from the parameter uri.
     * If array _POST is not empty - is calling method for edit the entry.
     * If user has entered incorrect data - is showing error
     * @param string $uriSegment. Data about the student that need to be edited
     */
    public function editAction($uriSegment)
    {
        /**
         * @var array. Data that is sent to the view
         */
        $data = null;
        if (!$_POST) {
            /**
             * @var array Data about student
             */
            $data = explode('-', $uriSegment);
            $this->view->show('editView.php', $data);
        } else {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->model->editInfo($_POST);
            if ($result == 1) {
                header('Location: /test');
            } else {
                /**
                 * @var array. Array of entered incorrect values
                 */
                $data = array_values($_POST);
                /**
                 * @var string. Error for user
                 */
                $data['error'] = 'Incorrect data';
                $this->view->show('editView.php', $data);
            }
        }

    }

    /**
     *If requested URI is not existing - this method shows page with error message
     */
    public function errorAction()
    {
        $this->view->show('errorView.php', 'This page does not exist');
    }
}
