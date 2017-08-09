<?php

namespace Test\Core;

class Validator
{
    /**
     * This method receive data, that need cleaning and executes it.
     * @param array $data Data for validation
     * @return mixed
     */
    public static function clear($data)
    {
        foreach ($data as &$d) {
            $d = trim(strip_tags($d));
        }
        return $data;
    }
}