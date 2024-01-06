<?php
require 'rb-mysql.php';
R::setup(
    'mysql:host=localhost;dbname=chat',
    'root',
    ''
);

function getTime()
{
    date_default_timezone_set("Asia/Tehran");
    $time = time();
    return date("h:i:sa", $time);
}

function insertData($data)
{
    $currentTime = getTime();
    $messageTable = R::dispense('message');
    $messageTable->messagetext = $data;
    $messageTable->time = $currentTime;
    $id = R::store($messageTable);

    if (isset($id)) {
        echo "\n New record created successfully";
    }
}

function selectAllData()
{
    $data = R::getAll('SELECT * FROM message');
    return $data;
}

function deleteData($id,$table)
{
    $message = R::load($table, $id);
    $res = R::trash($message);
    return $res;
}