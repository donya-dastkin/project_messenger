<?php

function connect($servername, $username, $password, $dbname)
{

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


function insertData($conn, $data, $table)
{

    $sql = "INSERT INTO $table (messagetext) VALUES ('$data')";

    if ($conn->query($sql) === TRUE) {
        echo "\n New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
