<?php

namespace Test\Core;

/**
 * Class AbstractModel. Contains __construct and method for validation data
 * @package Test\Core
 */
abstract class AbstractModel
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
    /**
     * This method receive data, that need cleaning and executes it.
     * @param array $data Data for validation
     * @return mixed
     */
    protected function clear($data)
    {
        foreach ($data as &$d) {
            $d = trim(strip_tags($d));
        }
        return $data;
    }
}

