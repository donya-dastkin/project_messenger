<?php

include 'connection.php';

$message = $_GET['dialog__message'];
$message = strip_tags(trim($message));


if (!empty($message)) {
    insertData($message);
}

R::close();