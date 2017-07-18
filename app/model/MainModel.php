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
        public function addInfo($someValue){
            $info = explode('-', $someValue);
			$query = "INSERT INTO `info` VALUES (,$info[0], $info[1])";
			$result = $this->connect->exec($query);
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