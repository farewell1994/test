<?php

namespace Test\Controllers;

use Test\Core\AbstractController;

/**
 * Class BookController Controller for working with information about books
 * @package Test\Controllers
 */
class BookController extends AbstractController
{

    /**
     * This method calls the model method to retrieve all data and a method for showing results
     */
    public function showBookAction()
    {
        /**
         * @var array. Data about books
         */
        $data = $this->booksModel->getBooks();
        $this->view->show('bookView.php', $data);
    }

    /**
     *This method shows form for adding the entry and calls the model method to add the entry.
     * If the _POST array is empty - showing the form of adding the entry,
     * otherwise we call model method for processing of the received data.
     * If the query is successful - redirecting to the main page,
     * otherwise - redirecting to the page with an error
     */
    public function addBookAction()
    {
        /**
         * @var Data that is sent to the view
         */
        $data['type'] = 'books';
        $data['error'] = null;
        if (!empty($_POST)) {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->booksModel->addBook($_POST['name'], $_POST['author']);
            if ($result == true) {
                header('Location: /test/books');
            } else {
                /**
                 * @var array. Data that is sent to the error view.
                 */
                $data['error'] = 'Incorrect data';
                $data['type'] = 'books';
            }
        }
        $this->view->show('addView.php', $data);
    }

    /**
     *This method calls the model method to delete the entry.
     * If the query is successful - redirecting to the main page,
     * otherwise - redirecting to the page with an error
     * @param integer $uriSegment book's ID for deletion
     */
    public function deleteBookAction($uriSegment)
    {
        /**
         * @var integer. Assigned 1 if the query is successful
         */
        $result = $this->booksModel->deleteBook($uriSegment);
        if ($result == true) {
            header('Location: /test/books');
        } else {
            /**
             * @var array. Data that is sent to the error view.
             */
            $data['type'] = 'book';
            $data = 'Book not found';
            $this->view->show('errorView.php', $data);
        }
    }

    /**
     * This method shows form for edit entry and calls model method to edit entry.
     * If array _POST empty - showing form for edit entry. Data for the form is taken from the parameter uri.
     * If array _POST is not empty - is calling method for edit the entry.
     * If user has entered incorrect data - is showing error
     * @param string $uriSegment. Data about the books that need to be edited
     */
    public function editBookAction($uriSegment)
    {
        /**
         * @var array. Data that is sent to the view
         */
        $data = null;
        if (empty($_POST)) {
            /**
             * @var array Data about books
             */
            $data = explode('-', $uriSegment);
            $data['type'] = 'books';
            $this->view->show('editView.php', $data);
        } else {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->booksModel->editBook($_POST);
            if ($result == true) {
                header('Location: /test/books');
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
     * This method shows a form with a drop-down list of students to which you can attach a book
     * If array _POST empty - showing form for choosing student.
     * If array _POST is not empty - is calling method for bind the book.
     * If user has entered incorrect data - is showing error
     * @param integer $uriSegment. Book's ID
     */
    public function bindBookAction($uriSegment)
    {
        if(empty($_POST)) {
            /**
             * @var array. Data that is sent to the view
             */
            $data = $this->studentsModel->getStudents();
            $this->view->show('attachView.php', $data);
        } else {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->booksModel->bindBook($uriSegment, $_POST);
            if ($result == true) {
                header('Location: /test/books');
            } else {
                /**
                 * @var string. Error for user
                 */
                $data['type'] = 'book';
                $data['error'] = 'Book not found';
                $this->view->show('errorView.php', $data);
            }
        }
    }

    /**
     * This method calls the model method to unbind the book.
     * If the query is successful - redirecting to the main page,
     * otherwise - redirecting to the page with an error
     * @param integer $uriSegment. Book's ID
     */
    public function unbindBookAction($uriSegment) {
        /**
         * @var integer. Assigned 1 if the query is successful, 0 if not
         */
        $result = $this->booksModel->unbindBook($uriSegment);
        if ($result == true) {
            header('Location: /test/books');
        } else {
            /**
             * @var string. Error for user
             */
            $data['type'] = 'book';
            $data['error'] = 'Book not found';
            $this->view->show('errorView.php', $data);
        }
    }
}
