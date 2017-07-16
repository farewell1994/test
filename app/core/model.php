<?php
class Model
{
	function __construct(){
		$connect = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
	}
	public function getTable()
	{
	}
}