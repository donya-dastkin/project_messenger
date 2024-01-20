<?php
require 'message.php';

$messageText = $_GET['dialog__message'];
$chat_name = $_GET['activeChatlist'];
echo $chat_name;
$messageText = strip_tags(trim($messageText));

if (!empty($messageText)) {
    $message = new Message();
    $message->insertData($messageText, 404, $chat_name);
}

R::close();
?>