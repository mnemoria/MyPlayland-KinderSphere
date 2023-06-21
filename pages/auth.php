<?php
include 'server.php';

if(isset($_POST['teacher_login'])){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query1 = mysqli_query($connection, "SELECT * FROM `teacherinfo` WHERE email = '$email' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($query1) > 0){
        header('location:teacher_dashboard.php'); // PUT DASHBOARD PAGE HERE
    }else{
        $msg[] = 'Incorrect login details!';
        header('location:index.php');
    }
}

?>