<?php

require 'rb-mysql.php';

R::setup('mysql:host=localhost;dbname=chat','root','');

//? function

function sendTime(){
    
    date_default_timezone_set("Asia/Tehran");
    $time = time();
    return date("h:i:sa", $time);

}

function insertData($data){

    $sendTime=sendTime();
    $sendTime=sendTime();
    $messageTable = R::dispense('message');
    $messageTable->messagetext = $data;
    $messageTable->sendertype = 0;
    $messageTable->sendtime = $sendTime;
    $messageTable->chatname = "Donya Dstkin";
    
    $id = R::store($messageTable);
    
    if (isset($id)) {
        echo "\n New record created successfully";
    }
}

function selectAllData($table){

    $data = R::getAll("SELECT * FROM $table");
    return $data;
    
}

?>