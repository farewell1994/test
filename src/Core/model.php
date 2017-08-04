<?php
namespace Test\Core;

abstract class Model
{
    /**
     * @var object PDO. Connection to Data Base
     */
    protected $connect;

    /**
     * Model constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->connect = $db;
    }
}
