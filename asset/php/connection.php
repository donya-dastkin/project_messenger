<?php

require 'rb-mysql.php';

try {
    R::setup(
        'mysql:host=localhost;dbname=chat',
        'root',
        ''
    );
} catch (Exception $e) {
    die('Connection failed: ' . $e->getMessage());
}
function getTime()
{
    $timezone = new DateTimeZone("Asia/Tehran");
    $dateTime = new DateTime("now", $timezone);
    
    return $dateTime->format("h:i:sa");
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


