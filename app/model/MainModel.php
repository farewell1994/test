<?php
    class MainModel extends Model{
		function getTable(){
		    $query = "SELECT `id`, `name`, `age` FROM `info`";
		    $result = $this->connect->query($query);
			return $result;
		}
	}