<?php

require 'path/to/redbean/rb.php';


R::setup('mysql:host=localhost;dbname=chat', 'root', '');

if (!R::testConnection()) {
    exit('Connection failed');
}

?>
