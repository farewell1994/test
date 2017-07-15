<?php
ini_set('display_errors', 1);
require_once 'app/bootstrap.php';
require_once 'app/config.php';
$connect = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
