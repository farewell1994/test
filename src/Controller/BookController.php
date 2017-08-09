<?php

namespace Test\Controller;

use Test\Core\Controller;

class BookController extends Controller
{
    public function showBookAction()
    {
        $data = $this->booksModel->getBooks();
        $this->view->show('bookView.php', $data);
    }
    public function addBookAction()
    {
        /**
         * @var Data that is sent to the view
         */
        $data['type'] = 'books';
        $data['error'] = null;
        if ($_POST) {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->booksModel->addBook($_POST['name'], $_POST['author']);
            if ($result == 1) {
                header('Location: /test/books');
            } else {
                $data['error'] = 'Incorrect data';
                $data['type'] = 'books';
            }
        }
        $this->view->show('addView.php', $data);
    }
    public function deleteBookAction($uriSegment)
    {
        /**
         * @var integer. Assigned 1 if the query is successful
         */
        $result = $this->booksModel->deleteBook($uriSegment);
        if ($result == 1) {
            header('Location: /test/books');
        } else {
            /**
             * @var Data that is sent to the view
             */
            $data['type'] = 'book';
            $data = 'Book not found';
            $this->view->show('errorView.php', $data);
        }
    }
    public function editBookAction($uriSegment)
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
            $data['type'] = 'books';
            $this->view->show('editView.php', $data);
        } else {
            /**
             * @var integer. Assigned 1 if the query is successful
             */
            $result = $this->booksModel->editBook($_POST);
            if ($result == 1) {
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

}