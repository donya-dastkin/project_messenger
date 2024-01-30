<?php
require '/xampp/htdocs/project_messanger/asset/app/Router/Router.php';
$requestURI =$_SERVER['REQUEST_URI'] ;

$obj = new Router($requestURI);
$obj->routing();