<?php

include 'Database.php' ;

$message =$_GET['dialog__message'];
$message = strip_tags(trim($message));

//? run function

if (!empty($message)) {
    insertData($message);
}

R::close();
?>