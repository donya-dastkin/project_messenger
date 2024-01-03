<?php

require 'connection.php';

function getMessages() {
    return R::findAll('messages');
}

function sendMessage($message) {
    $messageBean = R::dispense('messages');
    $messageBean->content = $message;
    R::store($messageBean);
}
?>
