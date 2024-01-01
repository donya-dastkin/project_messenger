<?php

include 'connection.php';

$conn = connect("localhost", "root", "", "chat");


$data = selectAllData($conn, 'message', 'messagetext');

$conn->close();

echo json_encode($data);
exit();