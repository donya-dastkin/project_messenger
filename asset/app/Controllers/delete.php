<?php

require '../Models/messages/Message.php';


$deleteType = $_GET['deleteType'];
$message = new Message();

switch ($deleteType) {
    case 'single-real': {
            $id = $_GET['dataID'];
            if (!empty($id)) {
                try {
                    $message->deleteData([$id]);
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
            break;
        }
    case 'single-physical': {
            $id = $_GET['dataID'];
            if (!empty($id)) {
                try {
                    $message->deleteDataphysical($id);
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
            break;
        }
    case 'integrated': {
            $chatlistName = $_GET['activeChatlist'];
            if (!empty($chatlistName)) {
                try {
                    $id = $message->deleteChatHistory($chatlistName);
                    header('Content-Type: application/json');
                    http_response_code(200);
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'deleted...',
                        'data' => $id,
                    ]);
                } catch (Exception $err) {
                    header('Content-Type: application/json');
                    http_response_code(500);
                    error_log($err->getMessage() . "\n", 3, "err.txt");
                }
            }
            break;
        }
}

R::close();