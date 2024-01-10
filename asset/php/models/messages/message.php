<?php
require '../../db/init.php';

class Message
{
    private function getTime()
    {
        date_default_timezone_set("Asia/Tehran");
        $now = time();
        return $now;
    }

    public function insertData($data, $userId, $chat_name)
    {
        try {
            $currentTime = $this->getTime();
            $messageTable = R::dispense('message');
            $messageTable->text_message = $data;
            $messageTable->send_time = $currentTime;
            $messageTable->user_id = $userId;
            $messageTable->sender_type = 0;
            $messageTable->chat_name = $chat_name;
            $id = R::store($messageTable);

            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'data' => $data
            ]);
        } catch (Exception $err) {
            http_response_code(404);
            echo json_encode([
                'status' => 'failed',
                'message' => $err->getMessage()
            ]);
        }
    }

    public function selectAllData()
    {
        try {
            $data = R::getAll('SELECT * FROM message ORDER BY send_time ASC');
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'message' => '',
                'data' => $data
            ]);
        } catch (Exception $err) {

            http_response_code(404);
            echo json_encode([
                'status' => 'failed',
                'message' => $err->getMessage()
            ]);
        }
    }

    public function updateData($id, $table, $newMessage)
    {
        try {
            $message = R::load($table, $id);
            $message->text_message = $newMessage;
            R::store($message);
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'message' => '',
                'data'=>$newMessage
            ]);
        } catch (Exception $err) {
            http_response_code(404);
            echo json_encode([
                'status' => 'failed',
                'message' => $err->getMessage()
            ]);
        }
    }

    public function deleteData($id)
    {
        try {
            R::trashBatch('message', $id);

            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'message' => 'deleted...',
            ]);
        } catch (Exception $err) {
            http_response_code(404);
            echo json_encode([
                'status' => 'failed',
                'message' => $err->getMessage()
            ]);
        }
    }
}