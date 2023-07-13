<?php

session_start();


if (isset($_SESSION["admin_login"]) || isset($_SESSION["teacher_login"]) || isset($_SESSION["student_login"])) {

    $_SESSION = array();

    session_destroy();

    header("Location: ../");
    exit();
}



?>

