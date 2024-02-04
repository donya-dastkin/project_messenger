<?php
namespace App\Models;
use \RedBeanPHP\R as R;
R::setup(
    'mysql:host=localhost;dbname=chat',
    'root',
    ''
);
trait CreateSendTime
{
    public static function CreateTime()
    {
        date_default_timezone_set("Asia/Tehran");
        $now = time();
        return $now;
    }
}

class Message extends \RedBeanPHP\SimpleModel {
    use CreateSendTime;
    public static function insertData(string $data, int $userId, string $chat_name)
    {

        $currentTime = self::CreateTime();
        $messageTable = R::dispense('message');
        $messageTable->text_message = $data;
        $messageTable->send_time = $currentTime;
        $messageTable->user_id = $userId;
        $messageTable->chat_name = $chat_name;
        $messageTable->deleted = 0;
        R::store($messageTable);
    }

    public static function selectAllData(int $up): array
    {

        $data = R::getAll('SELECT * FROM message WHERE deleted=0 ORDER BY send_time ASC LIMIT ' . $up . ',' . 2);
        return $data;
    }

    public static function updateData(int $id, string $table, string $newMessage)
    {
        $message = R::load($table, $id);
        $message->text_message = $newMessage;
        R::store($message);
    }

    public static function deleteData(int $id)
    {
        $message = R::load('message', $id);
        R::trash($message);
    }

    public static function deleteDataphysical(int $id)
    {
        $message = R::load('message', $id);
        $message->deleted = 1;
        R::store($message);
    }

    public static function deleteChatHistory(string $chatlistName)
    {
        $messages = R::find('message', ' chat_name LIKE ? ', [$chatlistName . '%']);
        $id = [];
        foreach ($messages as $msg) {
            array_push($id, $msg['id']);
        }
        R::trashBatch('message', $id);
    }
    public  function __destruct()
    {
    R::close();
    }
}