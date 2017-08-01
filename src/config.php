<?php
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'students');
$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$DefaultController = "Main";
$DefaultAction = "index";
$uriSegment = null;