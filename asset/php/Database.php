<?php

//? function

function connect($servername, $username, $password, $dbname){
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;

}

function sendTime(){
    
    date_default_timezone_set("Asia/Tehran");
    $time = time();
    return date("h:i:sa", $time);

}

function insertData($conn, $data,$table){
    $sendTime=sendTime();
    $sql = "INSERT INTO $table (messagetext,sendertype,sendtime,chatname) 
        VALUES ('$data',0,'$sendTime','Donya Dstkin')";
        if ($conn->query($sql) === TRUE) {
            echo "\n New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

}

function selectAllData($conn,$table){

    $sql = "SELECT * FROM `$table` ORDER BY `id` ASC";
    $result = mysqli_query($conn,$sql);
    
    $chatList = array("chatname"=>"", "chatlist"=>"");
    $data = array("id"=>"", "messagetext"=>"", "sendertype"=>"","sendtime"=>"");
    
    while($row = mysqli_fetch_array($result)){
    
    $data["id"]=$row["id"];
    $data["messagetext"]=$row["messagetext"];
    $data["sendertype"]=$row["sendertype"];
    $data["sendtime"]=$row["sendtime"];
    $chatList["chatname"]=$row["chatname"];
    $chatList["chatlist"]=$data;

    
    $json = json_encode($chatList);
    
    echo $json;
    echo "<br>";
    echo "<br>";
    
    };
    
    }