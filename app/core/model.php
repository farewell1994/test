<?php
class Model
{        
    protected $connect;
    function __construct(){
	    try{
        $this->connect = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
    }
	public function getInfo()
	{
	}
	public function addInfo(){
		
	}
	public function deleteInfo(){
		
	}
	public function redactInfo(){
		
	}
}