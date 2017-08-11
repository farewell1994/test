<?php

namespace Test\Models;

use Test\Core\AbstractModel;

/**
 * Class Students. Class for working with the database table 'students'
 * @package Test\Model
 */
class Students extends AbstractModel
{

    /**
     * This method queries all data from the database and returns them
     * @return PDO statement. Data about students
     */
    public function getStudents()
    {
        $query = "SELECT
                      s.id, s.name, s.age, 
                      GROUP_CONCAT(b.title) books
                  FROM 
                      students s 
                  LEFT JOIN 
                      books b 
                  ON 
                      s.id =  b.student_id
                  GROUP BY s.id";
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
     * @param string $name name of student
     * @param integer $age age of student
     * @return integer
     */
    public function addStudent($name, $age)
    {
        /**
         * @var integer. 0 if the data is incorrect, 1 if correct
         */
        $result = 0;
        if ($name!="" && $age != 0) {
            /**
             * @var array. Result of validation
             */
            $validateData = $this->clear(func_get_args());
            $query = "INSERT INTO `students` (`id`, `name`, `age`) VALUES (NULL,'$validateData[0]','$validateData[1]')";
            $result = $this->connect->exec($query);
        }
        return $result;
    }

    /**
     * This method takes a URI parameter and executes a query to remove a entry from the database
     * @param string $uriSegment ID student
     * @return integer
     */
    public function deleteStudent($uriSegment)
    {
        $id = $uriSegment;
        $query = "DELETE FROM `students` WHERE `id`=$id";
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
     * @param array $data. Data received from the user (id, name, age)
     * @return integer
     */
    public function editStudent($data)
    {
        /**
         * @var integer. Takes the value 1 if the query is successful, 0 if not successful
         */
        $result = 0;
        if ($data['name']!= "" && $data['age'] != 0) {
            /**
             * @var array. Result of validation
             */
            $validateData = $this->clear($_POST);
            $query = "UPDATE `students` SET `name`='$validateData[name]', `age`='$validateData[age]' WHERE `id`='$validateData[id]'";
            $result = $this->connect->exec($query);
        }
        return $result;
    }
}
