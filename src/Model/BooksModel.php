<?php

namespace Test\Model;

use Test\Core\Model;

class BooksModel extends Model
{
    public $data;
    public function getBooks()
    {
        $query = "SELECT `id`, `name`, `author`, `student_id` FROM `books`";
        $result = $this->connect->query($query);
        foreach($result as $d){
            $this->data[] = $d;
        }
        return $this->data;
    }
    public function addBook($name, $author)
    {
        /**
         * @var integer. 0 if the data is incorrect, 1 if correct
         */
        $result = 0;
        if ($name!="" && $author != "") {
            /**
             * @var array. Result of validation
             */
            $validateData = $this->clear(func_get_args());
            $query = "INSERT INTO `books` (`id`, `name`, `author`) VALUES (NULL,'$validateData[0]','$validateData[1]')";
            $result = $this->connect->exec($query);
        }
        return $result;
    }
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
    public function editBook($data)
    {
        /**
         * @var integer. Takes the value 1 if the query is successful, 0 if not successful
         */
        $result = 0;
        if ($data['name']!= "" && $data['author'] != "") {
            /**
             * @var array. Result of validation
             */
            $validateData = $this->clear($_POST);
            $query = "UPDATE `books` SET `name`='$validateData[name]', `author`='$validateData[author]' WHERE `id`='$validateData[id]'";
            $result = $this->connect->exec($query);
        }
        return $result;
    }
    public function bindBook($uriSegment, $data)
    {
        $validateData = $this->clear($data);
        $query = "UPDATE `books` SET `student_id`='$validateData[id]' WHERE `id` = '$uriSegment'";
        $result = $this->connect->exec($query);
        return $result;
    }
    public function unbindBook($uriSegment) {
        $query = "UPDATE `books` SET `student_id`=null WHERE `id` = '$uriSegment'";
        $result = $this->connect->exec($query);
        return $result;
    }
}