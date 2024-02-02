<?php
require 'MessageController.php';

$messageText = $_GET['dialog__message'];
$chat_name = $_GET['activeChatlist'];
$messageText = strip_tags(trim($messageText));

if (!empty($messageText)) {
    $message = new MessageController();
    try {
        $message->setData($messageText, 404, $chat_name);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
        ]);
    } catch (Exception $err) {
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode([
            'status' => 'failed',
            'message' => $err->getMessage()
        ]);
        error_log($err->getMessage() . "\n", 3, "err.txt");
    }
}
R::close();
?>