<?php

require 'message.php';

$id = $_GET['dataID'];
$newMessage = $_GET['newMessage'];
$id = strip_tags(trim($id));
$newMessage = strip_tags(trim($newMessage));

if (!empty($id)) {
    $message=new Message();
    $res = $message->updateData($id, 'message', $newMessage);
    if (isset($res)) {
        echo $newMessage;   
    }
}

R::close();