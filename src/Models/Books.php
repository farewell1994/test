<?php

namespace Test\Models;

use Test\Core\AbstractModel;

/**
 * Class Books. Class for working with the database table 'books'
 * @package Test\Model
 */
class Books extends AbstractModel
{

    /**
     * This method queries all data from the database and returns them
     * @return PDO statement. Data about students
     */
    public function getBooks()
    {
        $query = "SELECT 
                      b.id, b.title, b.author,
                      s.name
                  FROM
                      books b
                  LEFT JOIN
                      students s
                  ON
                      b.student_id = s.id";
        /**
         * @var. PDO statement
         */
        $result = $this->connect->query($query);
        return $result;
    }

    /**
     * This method takes data, checks them for correctness.
     * If the data is correct - calls the method for validation and executes
     * the query to add the entry to the database.
     * @param string $title name of book
     * @param integer $author name of author
     * @return integer. Result of query
     */
    public function addBook($title, $author)
    {
        /**
         * @var integer. 0 if the data is incorrect, 1 if correct
         */
        $result = 0;
        if ($title != "" && $author != "") {
            /**
             * @var array. Result of validation
             */
            $validateData = $this->clear(func_get_args());
            $query = "INSERT INTO `books` (`id`, `title`, `author`) VALUES (NULL,'$validateData[0]','$validateData[1]')";
            /**
             * @var. integer. Takes the value 1 if the query is successful, 0 if not successful
             */
            $result = $this->connect->exec($query);
        }
        return $result;
    }

    /**
     * This method takes a URI parameter and executes a query to remove a entry from the database
     * @param string $uriSegment ID book
     * @return integer. Result of query
     */
    public function deleteBook($uriSegment)
    {
        $id = $uriSegment;
        $query = "DELETE FROM `books` WHERE `id`=$id";
        /**
         * @var integer. Takes the value 1 if the query is successful, 0 if not successful
         */
        $result = $this->connect->exec($query);
        return $result;
    }

    /**
     * This method takes data, checks them for correctness.
     * If the data is correct - calls the method for validation and executes
     * the query to edit the entry in the database.
     * @param array $data. Data received from the user (id, title, author)
     * @return integer. Result of query
     */
    public function editBook($data)
    {
        /**
         * @var integer. Takes the value 1 if the query is successful, 0 if not successful
         */
        $result = 0;
        if ($data['title'] != "" && $data['author'] != "") {
            /**
             * @var array. Result of validation
             */
            $validateData = $this->clear($_POST);
            $query = "UPDATE `books` SET `title`='$validateData[title]', `author`='$validateData[author]' WHERE `id`='$validateData[id]'";
            /**
             * @var. integer. Takes the value 1 if the query is successful, 0 if not successful
             */
            $result = $this->connect->exec($query);
        }
        return $result;
    }

    /**
     * This method takes data, validates them and execute query for connecting student and book
     * @param integer $uriSegment. Book's ID
     * @param integer $data . Student's ID
     * @return mixed
     */
    public function bindBook($uriSegment, $data)
    {
        /**
         * @var array. Result of validation
         */
        $validateData = $this->clear($data);
        $query = "UPDATE `books` SET `student_id`=".$validateData["id"]." WHERE `id` = ".$uriSegment;
        /**
         * @var integer. Takes the value 1 if the query is successful, 0 if not successful
         */
        $result = $this->connect->exec($query);
        return $result;
    }

    /**
     * This method takes the identifier of the book and detaches it from the student.
     * @param int $uriSegment Book's ID.
     * @param bool $deleteStudent. Accepts the value of the student's ID when it is deleted and untie the attached book from it
     * @return mixed
     */
    public function unbindBook($uriSegment, $deleteStudent = false) {
        if ($deleteStudent == false) {
            $query = "UPDATE `books` SET `student_id`=null WHERE `id` = '$uriSegment'";
            /**
             * @var integer. Takes the value 1 if the query is successful, 0 if not successful
             */
            $result = $this->connect->exec($query);
            return $result;
        } else {
            $query = "UPDATE `books` SET `student_id`=null WHERE `student_id` = '$deleteStudent'";
            $this->connect->exec($query);
        }
    }
}

