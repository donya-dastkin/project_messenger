<?php
include 'Database.php';

$id = [$_GET['dataId']];

$res = deleteData('message',$id);

R::close();

?>