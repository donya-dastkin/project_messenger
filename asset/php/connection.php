<?php
require 'rb-mysql.php';
R::setup(
    'mysql:host=denali.liara.cloud;port=30653;dbname=nostalgic_dhawan',
    'root',
    'vJrQfykjPME4lBkXo5DqcEWB'
);

function getTime()
{
    date_default_timezone_set("Asia/Tehran");
    $time=date("h:i:sa", time());
    $time=substr($time,0,8);
    return $time;
}

function insertData($data)
{
    $currentTime = getTime();
    $messageTable = R::dispense('message');
    $messageTable->text_message = $data;
    $messageTable->send_time = $currentTime;
    $messageTable->user_id = 191;
    $messageTable->sender_type = 0;
    $messageTable->chat_name = 'farawin';
    $id = R::store($messageTable);

    if (isset($id)) {
        echo "New record created successfully!";
    }
}

function selectAllData()
{
    $data = R::getAll('SELECT * FROM message');
    return $data;
}

function deleteData($id, $table)
{
    $message = R::load($table, $id);
    $res = R::trash($message);
    return $res;
}