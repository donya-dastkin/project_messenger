<?php

include 'connection.php';

$message = $_GET['dialog__message'];
echo $message;



//? run function

$conn = connect("localhost", "root", "", "chat");
$table = "message";
if ($message and $message != "") {
    insertData($conn, $message, $table);
}

$conn->close();
