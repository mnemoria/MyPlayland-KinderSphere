<?php
include 'server.php';

if(isset($_POST[$userRole . '_login'])){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query1 = mysqli_query($connection, "SELECT * FROM `{$_GLOBAL['userRole']}info` WHERE email = '$email' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($query1) > 0){
        header(`location:{$_GLOBAL['userRole']}_dashboard.php`); // PUT DASHBOARD PAGE HERE
    }else{
        $msg[] = 'Incorrect login details!';
        header('location:index.php');
    }
}

?>