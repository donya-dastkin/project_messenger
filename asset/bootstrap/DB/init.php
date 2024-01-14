<?php
require '/xampp/htdocs/project_messenger/asset/bootstrap/ORM/rb-mysql.php';
// R::setup(
//     'mysql:host=denali.liara.cloud;port=30653;dbname=nostalgic_dhawan',
//     'root',
//     'vJrQfykjPME4lBkXo5DqcEWB'
// );
R::setup(
    'mysql:host=localhost;dbname=chat',
    'root',
    ''
);