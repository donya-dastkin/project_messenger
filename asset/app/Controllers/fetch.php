<?php

require '../Models/messages/Message.php';

$message = new Message();

try {
    $data = $message->selectAllData();
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'message' => '',
        'data' => $data
    ]);
} catch (Exception $err) {
    header('Content-Type: application/json');
    http_response_code(500);
    error_log($err->getMessage() . "\n", 3, "err.txt");
}

R::close();


exit();