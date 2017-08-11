<?php

namespace Test\Controllers;

use Test\Core\AbstractController;

/**
 * Class StudentController Controller for working with information about students
 * @package Test\Controller
 */
class StudentController extends AbstractController
{
    /**
     * This method calls the model method to retrieve all data and a method for showing results
     */
    public function showStudentsAction()
    {
        /**
         * @var array. Data about students
         */
        $data = $this->studentsModel->getStudents();
        $this->view->show('studentsView.php', $data);
    }

    /**
     *This method calls the model method to delete the entry.
     * If the query is successful - unbinding a book and redirecting to the main page,
     * otherwise - redirecting to the page with an error
     * @param integer $uriSegment student ID for deletion
     */
    public function deleteStudentAction($uriSegment)
    {
        /**
         * @var integer. Assigned 1 if the query is successful, 0 if not
         */
        $result = $this->studentsModel->deleteStudent($uriSegment);
        if ($result == true) {
            $this->booksModel->unbindBook(false, $uriSegment);
            header('Location: /test');
        } else {
            /**
             * @var array. Data that is sent to the error view.
             */
            $data['type'] = 'student';
            $data['error'] = 'Student not found';
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
    public function addStudentAction()
    {
        /**
         * @var array. Data that is sent to the view
         */
        $data['type'] = 'students';
        $data['error'] = null;
        if (!empty($_POST)) {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->studentsModel->addStudent($_POST['name'], $_POST['age']*1);
            if ($result == true) {
                header('Location: /test');
            } else {
                /**
                 * @var array. Data that is sent to the error view.
                 */
                $data['type'] = 'students';
                $data['error'] = 'Incorrect data';
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
    public function editStudentAction($uriSegment)
    {
        /**
         * @var array. Data that is sent to the view
         */
        $data[] = null;
        if (empty($_POST)) {
            /**
             * @var array Data about student
             */
            $data = explode('-', $uriSegment);
            $data['type'] = 'students';
            $this->view->show('editView.php', $data);
        } else {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->studentsModel->editStudent($_POST);
            if ($result == true) {
                header('Location: /test');
            } else {
                /**
                 * @var array. Array of entered incorrect values
                 */
                $data = array_values($_POST);
                /**
                 * @var array. Data that is sent to the error view.
                 */
                $data['type'] = 'students';
                $data['error'] = 'Incorrect data';
                $this->view->show('editView.php', $data);
            }
        }
    }
}
-