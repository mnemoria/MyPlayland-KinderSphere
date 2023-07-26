<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

    $student_id = $_SESSION['student_id'];

    $query1 = "SELECT * FROM student_info WHERE id = $student_id";
    $result1 = $connection->query($query1);

    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();
        $class_id = $row["class_id"];
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $lrn = $row["lrn"];
        $email = $row["email"];
        $birthdate = $row["birthdate"];
        $sex = $row["sex"];
        $address = $row["address"];
        $picture = $row["picture"];
        $parent_name = $row["parent_name"];
        $phone = $row["phone"];
        $message = $row["message"];
        $status = $row["status"];
        $gwa = $row["gwa"];
    } else {
        $class_id = "N/A";
        $firstname = "N/A";
        $lastname = "N/A";
        $lrn = "N/A";
        $email = "N/A";
        $birthdate = "N/A";
        $sex = "N/A";
        $address = "N/A";
        $picture = "N/A";
        $parent_name = "N/A";
        $phone = "N/A";
        $message = "N/A";
        $status = "N/A";
        $gwa = "-/-";
    }

    $query2 = "SELECT * FROM class_info WHERE id = $class_id";
    $result2 = $connection->query($query2);

    if ($result2->num_rows > 0) {
        $row = $result2->fetch_assoc();
        $class_level = $row["class_level"];
        $class_name = $row["class_name"];
        $teacher_id = $row["teacher_id"];
    } else {
        $class_level = "N/A";
        $class_name = "N/A";
        $teacher_id = "N/A";
    }

    $query3 = "SELECT * FROM teacher_info WHERE id = $teacher_id";
    $result3 = $connection->query($query3);

    if ($result3->num_rows > 0) {
        $row = $result3->fetch_assoc();
        $t_firstname = $row["firstname"];
        $t_lastname = $row["lastname"];
        $t_phone = $row["phone"];
    } else {
        $t_firstname = "N/A";
        $t_lastname = "N/A";
        $t_phone = "N/A";
    }

    $connection->close();
?>