<?php
require '../../db/init.php';

class Message
{
    private function sendTime()
    {
        date_default_timezone_set("Asia/Tehran");
        $time = time();
        return $time;
    }

    public function insertData($data, $userId, $chat_name)
    {
        $currentTime = $this->sendTime();
        $messageTable = R::dispense('message');
        $messageTable->text_message = $data;
        $messageTable->send_time = $currentTime;
        $messageTable->user_id = $userId;
        $messageTable->sender_type = 0;
        $messageTable->chat_name = $chat_name;
        R::store($messageTable);
    }

    public function selectAllData()
    {
        $data = R::getAll('SELECT * FROM message ORDER BY send_time ASC');
        return $data;
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
        R::trashBatch('message', $ids);
    }
}