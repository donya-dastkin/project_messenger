<?php

require 'message.php';
$messageText = $_GET['dialog__message'];
$chat_name = $_GET['activeChatlist'];


$messageText = strip_tags(trim($messageText));


if (!empty($messageText)) {
    $message = new Message();
    $message->insertData($messageText, 191, $chat_name);
}

R::close();