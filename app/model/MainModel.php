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
			header('Location: http://localhost/test');
        }
        /**
         * @param $someValue
         */
        public function deleteInfo($someValue){
            $id = $someValue;
            $query = "DELETE FROM `info` WHERE `id`=$id";
			$result = $this->connect->exec($query);
        }

        /**
         * @param $id
         * @param $name
         * @param $age
         */
        public function editInfo($id, $name, $age){
            $query = "UPDATE `info` SET `name`=$name, `age`=$age WHERE `id`=$id";
            $result = $this->connect->exec($query);		
        }
	}