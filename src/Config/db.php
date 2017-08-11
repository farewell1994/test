<?php

namespace Test\Config;

/**
 * Class DBConfig. Contains static variable with data  base configurations
 * @package Test\Config
 */
class DBConfig
{
    /**
     * @var array. Array of data base configurations
     */
    public static $dbConfig = array(
        'user' => 'root',
        'pass' => '',
        'host' => 'localhost',
        'database' => 'test',
        );
}