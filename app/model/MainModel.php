<?php
    class MainModel extends Model{
		function getInfo(){
		    $query = "SELECT `id`, `name`, `age` FROM `info`";
		    $result = $this->connect->query($query);
			return $result;
		}
	}