<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'myplaylandsis';

    $connection = mysqli_connect($serverName, $userName, $password, $dbName) or die('connection failed');
    
?>