<?php

include 'connection.php';

$conn = connect("localhost", "root", "", "chat");

function selectAllData($conn, $table, $field)
{

    $sql = "SELECT $field FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_all();
        echo json_encode($data);
    } else {
        echo "0 results";
    }
}

selectAllData($conn, 'message', 'messagetext');

$conn->close();
