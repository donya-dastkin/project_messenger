<?php

require '/xampp/htdocs/project_messenger/asset/bootstrap/DB/init.php';

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
        $messageTable->deleted = 0;
        R::store($messageTable);
    }

    public function selectAllData($up)
    {
        $data = R::getAll('SELECT * FROM message WHERE deleted=0 ORDER BY send_time ASC LIMIT ' . $up . ',' . 2);
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
    public function deleteDataphysical($id)
    {
        $message = R::load('message', $id);
        $message->deleted = 1;
        R::store($message);
    }
    public function deleteChatHistory($chatlistName)
    {
        $messages = R::find('message', ' chat_name LIKE ? ', [$chatlistName . '%']);
        $id = [];
        foreach ($messages as  $msg) {
            array_push($id, $msg['id']);
        }
        R::trashBatch('message', $id);
        return $id;
    }
}