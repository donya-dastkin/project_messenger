<?php

require_once 'MessageController.php';

$id = $_GET['dataID'];

if (!empty($id)) {
    $message = new MessageController();
    $res = $message->delete($id);
    echo $res;
}

R::close();

?>