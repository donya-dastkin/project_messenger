<?php

include 'connection.php';

echo $data = json_encode(selectAllData());

R::close();

echo $data;

exit();