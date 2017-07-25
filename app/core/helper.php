<?php
class Helper
{
    public static function validate($data){
        foreach ($data as &$d){
            $d = trim(strip_tags($d));
        }
        return $data;
    }
}