<?php

require 'function.php';


$messages = getMessages();

foreach ($messages as $message) {
    echo $message->content . '<br>';
}

?>
