<?php

include 'connection.php';

$data = json_encode(selectAllData());

R::close();

echo $data;

exit();
