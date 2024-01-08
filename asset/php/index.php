<?php

include 'connection.php';

$message = $_GET['dialog__message'];
$chat_name=$_GET['activeChatlist'];


$message = strip_tags(trim($message));


if (!empty($message)) {
    insertData($message, 191,$chat_name);
}

R::close();