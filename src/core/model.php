<?php
namespace Test\Core;

abstract class Model
{
    protected $connect;
    /**
     * Model constructor.
     */
    public function __construct($db)
    {
        $this->connect = $db;
    }
}