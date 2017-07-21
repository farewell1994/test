<?php
abstract class Model
{        
    protected $connect;

    /**
     * Model constructor.
     */
    public function __construct(){
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
    public function addInfo($name, $age){
		
	}

    /**
     * @param $someValue
     */
    public function deleteInfo($uriSegment){
		
	}

    /**
     * @param $someValue
     */
    public function editInfo($uriSegment){
	
	}
}