<?php
require '/xampp/htdocs/project_messanger/vendor/autoload.php';
use App\Router\Router;
$requestURI =$_SERVER['REQUEST_URI'] ;

$obj = new Router($requestURI);
$obj->routing();

