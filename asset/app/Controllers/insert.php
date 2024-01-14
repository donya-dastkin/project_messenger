<?php

require '../Models/messages/Message.php';

$messageText = $_GET['dialog__message'];
$chat_name = $_GET['activeChatlist'];

$messageText = strip_tags(trim($messageText));

echo $messageText;
if (!empty($messageText)) {
    $message = new Message();
    try {
        $message->insertData($messageText, 191, $chat_name);
        echo 'yes';
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
        ]);
    } catch (Exception $err) {
        header('Content-Type: application/json');
        http_response_code(500);
        error_log($err->getMessage() . "\n", 3, "err.txt");
    }
}

R::close();