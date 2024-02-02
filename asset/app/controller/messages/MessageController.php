<?php
require './asset/app/models/messages/Message.php';

class MessageController {

    public function set(string $data, int $userId, string $chat_name){
        
        $messageText = $data['dialog__message'];
        $chat_name = $data['activeChatlist'];
        $messageText = strip_tags(trim($messageText));
        
        if (!empty($messageText)) {
            try {
                Message::insertData($data,404,$chat_name);
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

    public function get(){
        
        try {
            $messages = Message::selectAllData();
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

    public function delete($ids){
        if (!empty($ids)) {
            try {
                Message::deleteData($ids);
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
    }

    // public function update(){
        
    // }
    
}
R::close();
?>