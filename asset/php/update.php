<?php
include 'connection.php';

$id = $_GET['dataId'];
$newMessage = $_GET['newMessage'];
$id = strip_tags(trim($id));
$newMessage = strip_tags(trim($newMessage));

if (!empty($id)) {
    $res = updateData($id, 'message', $newMessage);
    if (isset($res)) {
        echo $newMessage;   
    }
}

R::close();