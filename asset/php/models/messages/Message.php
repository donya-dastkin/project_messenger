<?php
require '../../db/init.php';
require '../helper/auxiliarMmethods.php';

class Message
{

    use globalFonc;

    public function insertData($data, $userId, $chat_name)
    {
        try {
            $currentTime = $this->sendTime();
            $messageTable = R::dispense('message');
            $messageTable->text_message = $data;
            $messageTable->send_time = $currentTime;
            $messageTable->user_id = $userId;
            $messageTable->sender_type = 0;
            $messageTable->chat_name = $chat_name;

            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'data' => $data
            ]);
        } catch (Exception $err) {
            http_response_code(500);
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

            http_response_code(500);
            echo json_encode([
                'status' => 'failed',
                'message' => $err->getMessage()
            ]);
        }
    }

    // public function updateData($id, $table, $newMessage)
    // {
    //     //! try {
    //     //!     $message = R::load($table, $id);
    //     //!     $message->text_message = $newMessage;
    //     //!     R::store($message);
    //     //!     header('Content-Type: application/json');
    //     //!     http_response_code(200);
    //     //!     echo json_encode([
    //     //!         'status' => 'success',
    //     //!         'message' => '',
    //     //!         'data'=>$newMessage
    //     //!     ]);
    //     //! } catch (Exception $err) {
    //     //!     http_response_code(404);
    //     //!     echo json_encode([
    //     //!         'status' => 'failed',
    //     //!         'message' => $err->getMessage()
    //     //!     ]);
    //     //! }
    // }

    public function deleteData($ids)
    {
        try {
            R::trashBatch('message', $ids);

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