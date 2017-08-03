<?php
namespace Test\Model;
use Test\Core\Model;

class InfoModel extends Model
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
        $result = 0;
        if ($name!="" && $age != 0) {
            $validateData = $this->validate(func_get_args());
            $query = "INSERT INTO `info` (`id`, `name`, `age`) VALUES (NULL,'$validateData[0]','$validateData[1]')";
            $result = $this->connect->exec($query);
        }
        return $result;
    }

    /**
     * @param $uriSegment
     */
    public function deleteInfo($uriSegment)
    {
        $id = $uriSegment;
        $query = "DELETE FROM `info` WHERE `id`=$id";
        $result = $this->connect->exec($query);
        return $result;
    }

    /**
     * @param $data
     * @return string
     */
    public function editInfo($data)
    {
        $result = 0;
        if ($data['name']!= "" && $data['age'] != 0) {
            $validateData = $this->validate($_POST);
            $query = "UPDATE `info` SET `name`='$validateData[name]', `age`='$validateData[age]' WHERE `id`='$validateData[id]'";
            $result = $this->connect->exec($query);
        }
        return $result;
    }
    public function validate($data)
    {
        foreach ($data as &$d) {
            $d = trim(strip_tags($d));
        }
        return $data;
    }
}
