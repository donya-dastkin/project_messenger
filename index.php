<?php
require './asset/app/router/router.php';
$requestURI =$_SERVER['REQUEST_URI'] ;
$url = new router($requestURI);
$url->routing();

?>