<?php

function connect($servername, $username, $password, $dbname)
{

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function getTime()
{
    date_default_timezone_set("Asia/Tehran");
    $time = time();
    return date("h:i:sa", $time);
}

function insertData($conn, $data, $table)
{
    $currentTime = getTime();

    $sql = "INSERT INTO $table (messagetext,time) VALUES ('$data','$currentTime')";

    if ($conn->query($sql) === TRUE) {
        echo "\n New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
