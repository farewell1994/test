<?php
abstract class Model
{        
    protected $connect;
    function __construct(){
        $this->connect = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }
    public function getInfo(){
		
	}
	public function addInfo(){
		
	}
	public function deleteInfo($someValue){
		
	}
	public function editInfo($someValue){	
	
	}
}