<?php
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'students');

if($_SERVER['SERVER_ADDR']=='::1') {
    $enviroment = 1;
}
else{
    $enviroment = 0;
}