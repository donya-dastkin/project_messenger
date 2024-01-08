<?php
require 'rb-mysql.php';
// R::setup(
//     'mysql:host=denali.liara.cloud;port=30653;dbname=nostalgic_dhawan',
//     'root',
//     'vJrQfykjPME4lBkXo5DqcEWB'
// );
R::setup(
    'mysql:host=localhost;dbname=chat',
    'root',
    ''
);

function getTime()
{
    date_default_timezone_set("Asia/Tehran");
    $now = date('Y-m-d h:i:sa', strtotime('now'));
    return $now;
}

function insertData($data, $userId, $chat_name)
{
    $currentTime = getTime();
    $messageTable = R::dispense('message');
    $messageTable->text_message = $data;
    $messageTable->send_time = $currentTime;
    $messageTable->user_id = $userId;
    $messageTable->sender_type = 0;
    $messageTable->chat_name = $chat_name;
    $id = R::store($messageTable);

    if (isset($id)) {
        echo "New record created successfully!";
    }
}

function selectAllData()
{
    $data = R::getAll('SELECT * FROM message ORDER BY send_time ASC');
    return $data;
}

function deleteData($id, $table)
{
    $message = R::load($table, $id);
    $res = R::trash($message);
    return $res;
}
function updateData($id,$table,$newMessage){
    $message = R::load($table, $id);
    $message->text_message = $newMessage;
    $res=R::store( $message );
    return $res;
}