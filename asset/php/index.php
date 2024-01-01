<?php

include 'connection.php';

$message = $_GET['dialog__message'];
$message = strip_tags(trim($message));


//? run function

$conn = connect("localhost", "root", "", "chat");
$table = "message";

if (!empty($message)) {
    insertData($conn, $message, $table);
}

$conn->close();