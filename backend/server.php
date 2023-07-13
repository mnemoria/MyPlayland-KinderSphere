<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'myplaylandsis';
    // $dbName = 'user_roles';

    $connection = mysqli_connect($serverName, $userName, $password, $dbName) or die('connection failed');
    
    if (!$connection) {
        echo "Connection failed!";
    }
?>