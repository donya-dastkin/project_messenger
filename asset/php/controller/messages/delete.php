<?php

require 'MessageController.php';

$id = $_GET['dataID'];
if (!empty($id)) {
    $message = new MessageController();
    $res = $message->delete([(int)$id]);
    echo $res;
}

R::close();

?>