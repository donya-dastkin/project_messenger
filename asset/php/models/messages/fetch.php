<?php

require 'message.php';

$message=new Message();
$data = $message->selectAllData();
R::close();

echo $data;

exit();