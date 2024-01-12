<?php
require '../db/init.php';

trait CreateSendTime
{
    function CreateTime()
    {
        date_default_timezone_set("Asia/Tehran");
        $now = time();
        return $now;
    }
}

class Message
{
    use CreateSendTime;

    public function insertData($data, $userId, $chat_name)
    {
        $currentTime = $this->CreateTime();
        $messageTable = R::dispense('message');
        $messageTable->text_message = $data;
        $messageTable->send_time = $currentTime;
        $messageTable->user_id = $userId;
        $messageTable->chat_name = $chat_name;
         R::store($messageTable);
    }

    public function selectAllData()
    {
        $data = R::getAll('SELECT * FROM message ORDER BY send_time ASC');
        return $data;
    }

    public function updateData($id, $table, $newMessage)
    {
        $message = R::load($table, $id);
        $message->text_message = $newMessage;
         R::store($message);
    }

    public function deleteData($id)
    {
         R::trashBatch('message', $id);
    }
}