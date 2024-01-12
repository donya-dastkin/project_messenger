<?php

require '../Models/messages/Message.php';


$id = $_GET['dataID'];
$newMessage = $_GET['newMessage'];
$id = strip_tags(trim($id));
$newMessage = strip_tags(trim($newMessage));

if (!empty($id)) {
    $message = new Message();
    try {
        $message->updateData($id, 'message', $newMessage);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'message' => '',
            'data' => $newMessage
        ]);
    } catch (Exception $err) {
        header('Content-Type: application/json');
        http_response_code(500);
        error_log($err->getMessage() . "\n", 3, "err.txt");
    }
}

R::close();