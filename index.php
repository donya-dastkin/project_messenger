<?php
use app\Router\Router;
require '/xampp/htdocs/project_messanger/vendor/autoload.php';
require '/xampp/htdocs/project_messanger/bootstrap/Database.php';

Database::connection();

$requestURI =$_SERVER['REQUEST_URI'];

$obj = new Router($requestURI);
$obj->routing();

