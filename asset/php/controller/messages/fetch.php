<?php

require 'MessageController.php';

$message=new MessageController();
$data = $message->getData();

R::close();
exit();

?>