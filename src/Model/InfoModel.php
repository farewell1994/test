<?php
namespace Test\Model;
use Test\Core\Model;

/**
 * Class InfoModel Class for working with the database table 'info'
 * @package Test\Model
 */
class InfoModel extends Model
{
    /**
     * @var Array for returning
     */
    public $data;
    /**
     * This method queries all data from the database
     * @return mixed
     */
    public function getInfo()
    {
        $query = "SELECT `id`, `name`, `age` FROM `info`";
        $result = $this->connect->query($query);
        foreach($result as $d){
            $this->data[] = $d;
        }
        return $this->data;
    }

    /**
     * This method takes data, checks them for correctness.
     * If the data is correct - calls the method for validation and executes
     * the query to add the entry to the database.
     * @param string $name name of student
     * @param integer $age age of student
     * @return integer
     */
    public function addInfo($name, $age)
    {
        /**
         * @var integer. 0 if the data is incorrect, 1 if correct
         */
        $result = 0;
        if ($name!="" && $age != 0) {
            /**
             * @var array. Result of validation
             */
            $validateData = $this->validate(func_get_args());
            $query = "INSERT INTO `info` (`id`, `name`, `age`) VALUES (NULL,'$validateData[0]','$validateData[1]')";
            $result = $this->connect->exec($query);
        }
        return $result;
    }

    /**
     * This method takes a URI parameter and executes a query to remove a entry from the database
     * @param string $uriSegment ID student
     * @return integer
     */
    public function deleteInfo($uriSegment)
    {
        $id = $uriSegment;
        $query = "DELETE FROM `info` WHERE `id`=$id";
        /**
         * @var integer. Takes the value 1 if the query is successful, 0 if not successful
         */
        $result = $this->connect->exec($query);
        return $result;
    }

    /**
     * This method takes data, checks them for correctness.
     * If the data is correct - calls the method for validation and executes
     * the query to adit the entry in the database.
     * @param array $data. Data entered by the user (id, name, age)
     * @return integer
     */
    public function editInfo($data)
    {
        /**
         * @var integer. Takes the value 1 if the query is successful, 0 if not successful
         */
        $result = 0;
        if ($data['name']!= "" && $data['age'] != 0) {
            /**
             * @var array. Result of validation
             */
            $validateData = $this->validate($_POST);
            $query = "UPDATE `info` SET `name`='$validateData[name]', `age`='$validateData[age]' WHERE `id`='$validateData[id]'";
            $result = $this->connect->exec($query);
        }
        return $result;
    }

    /**
     * This method receive data, that need validation and executes it.
     * @param array $data Data for validation
     * @return mixed
     */
    public function validate($data)
    {
        foreach ($data as &$d) {
            $d = trim(strip_tags($d));
        }
        return $data;
    }
}
