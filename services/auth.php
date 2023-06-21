<?php
include 'server.php';

function authenticateTeacher($email, $password) {

    if ($email === 'teacher1@gmail.com' && $password === 'password') {
        echo 'true';
        return true;
    } else {
        echo 'false';
        return false;
    }

}




echo 'Hello'; if(isset($_POST['email'])) echo $_POST['email'];
if (isset($_POST['teacher_login'])) {
    
    echo 'Success Teacher Login sdsdsd';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $isAuthenticated = authenticateTeacher($email, $password);

    if ($isAuthenticated) {
        $_SESSION['userRole'] = 'teacher';
        header('Location: ../pages/teacher_dashboard.php');
        exit;
    } else {
        // header('Location: login.php?error=InvalidCredentials');
        header('Location: ../pages/login.php');
        exit;
    }
}

?>