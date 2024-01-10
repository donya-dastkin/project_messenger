<?php
require 'rb-mysql.php';

try{
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
    
}catch(Exception $err){
    die('connection failed: '.$err->getMessage());
}