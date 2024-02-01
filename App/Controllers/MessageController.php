<?php
namespace project\Controllers;
use project\Models\Message;
class MessageController
{
    public function set($data)
    {
        $messageText = $data['dialog__message'];
        $chat_name = $data['activeChatlist'];
        $messageText = strip_tags(trim($messageText));

        if (!empty($messageText)) {
            try {
                Message::insertData($messageText, 191, $chat_name);
                header('Content-Type: application/json');
                http_response_code(200);
                echo json_encode([
                    'status' => 'success',
                ]);
            } catch (Exception $err) {
                header('Content-Type: application/json');
                http_response_code(500);
                error_log('insert.php => ' . $err->getMessage() . "\n", 3, "err.txt");
            }
        }
    }

    public function update($data)
    {
        $id = $data['dataID'];
        $newMessage = $data['newMessage'];
        $id = strip_tags(trim($id));
        $newMessage = strip_tags(trim($newMessage));

        if (!empty($id)) {
            try {
                Message::updateData($id, 'message', $newMessage);
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
                error_log('update.php => ' . $err->getMessage() . "\n", 3, "err.txt");
            }
        }
    }

    public function delete($data)
    {
        $deleteType = $data['deleteType'];
        switch ($deleteType) {
            case 'single-real':
            {
                $id = $data['dataID'];
                if (!empty($id)) {
                    try {
                        Message::deleteData($id);
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
            case 'single-physical':
            {
                $id = $data['dataID'];
                if (!empty($id)) {
                    try {
                        Message::deleteDataphysical($id);
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
            case 'integrated':
            {
                $chatlistName = $data['activeChatlist'];
                if (!empty($chatlistName)) {
                    try {
                        Message::deleteChatHistory($chatlistName);
                        header('Content-Type: application/json');
                        http_response_code(200);
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'deleted...',
                        ]);
                    } catch (Exception $err) {
                        header('Content-Type: application/json');
                        http_response_code(500);
                        error_log('delete.php => ' . $err->getMessage() . "\n", 3, "err.txt");
                    }
                }
                break;
            }
        }
    }

    public function get($data)
    {
        $uploaded = (int)$data['uploaded'];
        try {
            $messages = Message::selectAllData($uploaded);
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'message' => '',
                'data' => $messages
            ]);
        } catch (Exception $err) {
            header('Content-Type: application/json');
            http_response_code(500);
            error_log('fetch.php => ' . $err->getMessage() . "\n", 3, "err.txt");
        }
    }
}
