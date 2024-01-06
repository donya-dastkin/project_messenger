<?php
include 'connection.php';

$id = $_GET['dataId'];
$id = strip_tags(trim($id));

if (!empty($id)) {
    $res = deleteData($id,'message');
    if ($res == 1) echo ("Deleted...");
    else echo ("Failed to delete data!");
}

R::close();