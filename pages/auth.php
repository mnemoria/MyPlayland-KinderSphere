<?php
    include 'server.php';

    function redirect($location){
        header("Location: $location");
        exit;
    }

    function loginUser($table, $email, $password, $redirect){
        global $connection;

        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = mysqli_query($connection, "SELECT * FROM `$table` WHERE email = '$email' AND password = '$password'") or die('Query failed');

        if(mysqli_num_rows($query) > 0){
            redirect($redirect);
        }else{
            $msg[] = 'Incorrect login details!';
            redirect('index.php');
        }
    }

    if(isset($_POST['student_login'])){
        loginUser('student', $_POST['email'], $_POST['password'], 'student_dashboard.php');
    }

    if(isset($_POST['teacher_login'])){
        loginUser('teacherinfo', $_POST['email'], $_POST['password'], 'teacher_dashboard.php');
    }
    
?>