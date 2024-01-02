<?php

include 'Database.php';

$data = json_encode(selectAllData("message"));

R::close();

echo $data;

exit();


?>