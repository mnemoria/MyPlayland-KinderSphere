<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

    $student_id = $_SESSION['student_id'];

    $query = "SELECT * FROM student_info WHERE id = $student_id";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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
    }

    $connection->close();
?>