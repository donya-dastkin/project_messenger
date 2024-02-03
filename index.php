<?php
require './vendor/autoload.php';
use project\router\router;

$requestURI =$_SERVER['REQUEST_URI'] ;
$url = new router($requestURI);
$url->routing();

?>