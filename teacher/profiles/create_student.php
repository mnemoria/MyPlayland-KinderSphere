<?php
// update_student.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['class_id']) &&
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['email']) &&
        isset($_POST['phone']) &&
        isset($_POST['address']) &&
        isset($_POST['sex']) &&
        isset($_POST['birthdate'])
        // Add other required fields as needed...
    ) {
        $class_id = trim($_POST['class_id']);
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        $sex = trim($_POST['sex']);
        $birthdate = trim($_POST['birthdate']);

        include 'validate_student.php';

        $query = "INSERT INTO student_info (class_id, firstname, lastname, email, phone, address, sex, birthdate) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        if (!$stmt) {
            echo json_encode(['success' => false, 'message' => 'Database error. Please try again later.']);
            exit; 
        }
        mysqli_stmt_bind_param($stmt, "isssssss", $class_id, $firstname, $lastname, $email, $phone, $address, $sex, $birthdate);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Profile create successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to create profile. Please try again later.']);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing or invalid data']);
    }
} else {
    echo json_encode(['success' => false]);
}

mysqli_close($connection);
?>