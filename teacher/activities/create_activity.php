<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['activity_num']) &&
        isset($_POST['activity_name']) &&
        isset($_POST['activity_desc']) &&
        isset($_POST['activity_total_points']) &&
        isset($_POST['addActDescInput'])
        // Add other required fields as needed...
    ) {
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        $sex = trim($_POST['sex']);
        $birthdate = trim($_POST['birthdate']);

        include 'validate_student.php';

        $query = "INSERT INTO student (name, surname, email, phone, address, sex, birthdate) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        if (!$stmt) {
            echo json_encode(['success' => false, 'message' => 'Database error. Please try again later.']);
            exit; 
        }
        mysqli_stmt_bind_param($stmt, "sssssss", $name, $surname, $email, $phone, $address, $sex, $birthdate);
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