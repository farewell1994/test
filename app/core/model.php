<?php
abstract class Model
{        
    protected $connect;

    /**
     * Model constructor.
     */
    function __construct(){
        $this->connect = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    /**
     *
     */
    public function getInfo(){
		
	}

    /**
     *
     */
    public function addInfo(){
		
	}

    /**
     * @param $someValue
     */
    public function deleteInfo($someValue){
		
	}

    /**
     * @param $someValue
     */
    public function editInfo($someValue){
	
	}
}