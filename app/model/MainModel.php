<?php
    class MainModel extends Model{
        /**
         * @return PDOStatement
         */
        public function getInfo(){
		    $query = "SELECT `id`, `name`, `age` FROM `info`";
		    $result = $this->connect->query($query);
			return $result;
		}

        /**
         * @param $someValue
         */
        public function addInfo($name, $age){
            $validateName = trim(strip_tags($name));
            $validateAge = trim(strip_tags($age));
			$query = "INSERT INTO `info` (`id`, `name`, `age`) VALUES (NULL,'$validateName','$validateAge')";
			$result = $this->connect->exec($query);
        }
        /**
         * @param $someValue
         */
        public function deleteInfo($uriSegment){
            $id = $uriSegment;
            $query = "DELETE FROM `info` WHERE `id`=$id";
			$result = $this->connect->exec($query);
        }

        /**
         * @param $id
         * @param $name
         * @param $age
         */
        public function editInfo($data){
            $name = $_POST["name"];
            $age = $_POST["age"];
            $id = $_POST["id"];
            $query = "UPDATE `info` SET `name`='$name', `age`='$age' WHERE `id`='$id'";
            $result = $this->connect->exec($query);
            return $query;
        }
	}