<?php
require 'rb-mysql.php';

try{
// R::setup('mysql:host=himalayas.liara.cloud;port=30854;dbname=happy_hamilton','root','VVvyXdNefDFq2NGFI8N0PY7s');
R::setup('mysql:host=localhost;dbname=chat','root','');
// R::setup('mysql:host=denali.liara.cloud;port=30653;dbname=nostalgic_dhawan','root','vJrQfykjPME4lBkXo5DqcEWB');
}catch(Exception $err){
    die('connection failed: '.$err->getMessage());
}

?>