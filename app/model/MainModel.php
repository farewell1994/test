<?php
    class MainModel extends Model{
		public function getInfo(){
		    $query = "SELECT `id`, `name`, `age` FROM `info`";
		    $result = $this->connect->query($query);
			return $result;
		}
        public function addInfo($name, $age){
			$query = "INSERT INTO `info` VALUES (,$name, $age)";
			$result = $this->connect->exec($query);
        }
        public function deleteInfo($someValue){
            $id = $someValue;
            $query = "DELETE FROM `info` WHERE `id`=$id";
			$result = $this->connect->exec($query);
        }
        public function editInfo($id, $name, $age){
            $query = "UPDATE `info` SET `name`=$name, `age`=$age WHERE `id`=$id";
            $result = $this->connect->exec($query);		
        }
	}