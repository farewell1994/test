<?php
$uriArray = explode('/', $_SERVER['REQUEST_URI']);
if (count($uriArray) == 5) {
    /**
     * @var string URI parameter
     */
    $uriSegment = $uriArray[4];
} else {
    $uriSegment = null;
}
return $uriSegment;