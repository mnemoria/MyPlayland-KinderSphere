<?php
// update_student.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required fields are present in the POST data
    if (
        isset($_POST['name']) &&
        isset($_POST['surname']) &&
        isset($_POST['email']) &&
        isset($_POST['phone']) &&
        isset($_POST['address']) &&
        isset($_POST['sex']) &&
        isset($_POST['birthdate']) &&
        isset($_POST['id']) 
        // Add other required fields as needed...
    ) {
        // Collect the data from the POST data
        // Collect the data from the POST data
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        $sex = trim($_POST['sex']);
        $birthdate = trim($_POST['birthdate']);
        $id = $_POST['id'];

        
        include 'validate_student.php';

        $query = "UPDATE student SET name = ?, surname = ?, email = ?, phone = ?, address = ?, sex = ?, birthdate = ? WHERE student_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        if (!$stmt) {
            echo json_encode(['success' => false, 'message' => 'Database error. Please try again later.']);
            exit; 
        }
        mysqli_stmt_bind_param($stmt, "sssssssi", $name, $surname, $email, $phone, $address, $sex, $birthdate, $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Profile updated successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update profile. Please try again later.']);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Return a JSON response indicating missing or invalid data
        echo json_encode(['success' => false, 'message' => 'Missing or invalid data']);
    }
} else {
    // Return a JSON response indicating invalid request method
    echo json_encode(['success' => false]);
}

mysqli_close($connection);
?>