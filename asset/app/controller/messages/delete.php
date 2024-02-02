<?php

require 'MessageController.php';

$id = $_GET['dataID'];
if (!empty($id)) {
    $message = new MessageController();
    try {
        $res = $message->delete([(int)$id]);
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'message' => 'deleted...',
        ]);
    } catch (Exception $err) {
        header('Content-Type: application/json');
        http_response_code(500);
        error_log($err->getMessage() . "\n", 3, "err.txt");
    }
}

R::close();
?>