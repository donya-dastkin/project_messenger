<?php

require 'MessageController.php';

$message=new MessageController();

try {
    $data = $message->getData();
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

?>