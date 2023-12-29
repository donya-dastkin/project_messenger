<?php

include 'Database.php' ;

$message ="";
//  $_GET['dialog__message'];

//? run function

$conn = connect("localhost", "root", "", "chat");
$table = "message";

if ($message!== "") {
    insertData($conn, $message, $table);
}

selectAllData($conn,$table);

$conn->close();
?>