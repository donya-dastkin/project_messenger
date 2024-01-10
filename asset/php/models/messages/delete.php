<?php

require 'message.php';

$id = $_GET['dataID'];
$id =$id;

if (!empty($id)) {
    $message = new Message();
    $res = $message->deleteData([$id], 'message');
    echo $res;
}

R::close();