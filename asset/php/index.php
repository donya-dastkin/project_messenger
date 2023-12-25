<?php

$message = $_GET['dialog__message'];
echo $message;

function connect($servername, $username, $password, $dbname)
{
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

$conn = connect("localhost", "root", "", "chat");

function insertData($conn, $data)
{

    $sql = "INSERT INTO messege (textvalue)
VALUES ('$data')";
    if ($conn->query($sql) === TRUE) {
        echo "\n New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

insertData($conn, $message);

$conn->close();
