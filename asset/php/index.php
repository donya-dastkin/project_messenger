<?php

$message = $_GET['dialog__message'];
echo $message;

//? function

function connect($servername, $username, $password, $dbname){

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

return $conn;

}

function insertData($conn, $data,$table){
    
$sql = "INSERT INTO $table (messagetext) VALUES ('$data')";

if ($conn->query($sql) === TRUE) {
    echo "\n New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

function selectAllData($conn,$table){
$sql = "SELECT * FROM $table";

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

//? run function

$conn = connect("localhost", "root", "", "chat");
$table = "message";
insertData($conn, $message,$table);

$conn->close();
?>