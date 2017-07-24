<?php
class MainModel extends Model
{
    /**
     * @return mixed
     */
    public function getInfo()
    {
        $query = "SELECT `id`, `name`, `age` FROM `info`";
        $result = $this->connect->query($query);
        return $result;
    }

    /**
     * @param $name
     * @param $age
     */
    public function addInfo($name, $age)
    {
        $validateName = trim(strip_tags($name));
        $validateAge = trim(strip_tags($age));
        $query = "INSERT INTO `info` (`id`, `name`, `age`) VALUES (NULL,'$validateName','$validateAge')";
        $result = $this->connect->exec($query);
    }

    /**
     * @param $uriSegment
     */
    public function deleteInfo($uriSegment)
    {
        $id = $uriSegment;
        $query = "DELETE FROM `info` WHERE `id`=$id";
        $result = $this->connect->exec($query);
    }

    /**
     * @param $data
     * @return string
     */
    public function editInfo($data)
    {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $id = $_POST["id"];
        $query = "UPDATE `info` SET `name`='$name', `age`='$age' WHERE `id`='$id'";
        $result = $this->connect->exec($query);
        return $query;
    }
}