<?php

require 'rb-mysql.php';

// R::setup('mysql:host=localhost;dbname=chat','root','');
R::setup('mysql:host=himalayas.liara.cloud;port=30854;dbname=happy_hamilton','root','VVvyXdNefDFq2NGFI8N0PY7s');

//? function

function sendTime(){
    date_default_timezone_set("Asia/Tehran");
    $time = time();
    return $time;
}
function insertData($data){

    $currentTime = sendTime();
    $messageTable = R::dispense('message');
    $messageTable->text_message = $data;
    $messageTable->send_time = $currentTime;
    $messageTable->user_id = 404;
    $messageTable->sender_type = 0;
    $messageTable->chat_name = 'farawin';
    $id = R::store($messageTable);

    if (isset($id)) {
        echo "New record created successfully!";
    }
}
function selectAllData($table){
    $data = R::getAll("SELECT * FROM $table");
    return $data;
}
function deleteData($table,$id){
    R::trashBatch($table, $id);
}

?>