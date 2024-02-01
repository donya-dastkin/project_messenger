<?php
require 'MessageController.php';

$messageText = $_GET['dialog__message'];
$chat_name = $_GET['activeChatlist'];
$messageText = strip_tags(trim($messageText));

if (!empty($messageText)) {
    $message = new MessageController();
    try {
        $message->setData($messageText, 404, $chat_name);
    } catch (Exception $err) {
        echo "hi";
        http_response_code(500);
        echo json_encode([
            'status' => 'failed',
            'message' => $err->getMessage()
        ]);
    }
}
R::close();
?>