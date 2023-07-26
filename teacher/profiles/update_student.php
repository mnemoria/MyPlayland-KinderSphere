<?php
// update_student.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required fields are present in the POST data
    if (
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['email']) &&
        isset($_POST['phone']) &&
        isset($_POST['address']) &&
        isset($_POST['sex']) &&
        isset($_POST['birthdate']) &&
        isset($_POST['lrn']) 
        // Add other required fields as needed...
    ) {
        // Collect the data from the POST data
        // Collect the data from the POST data
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        $sex = trim($_POST['sex']);
        $birthdate = trim($_POST['birthdate']);
        $lrn = $_POST['lrn'];

        
        include 'validate_student.php';

        $query = "UPDATE student_info SET firstname = ?, lastname = ?, email = ?, phone = ?, address = ?, sex = ?, birthdate = ? WHERE lrn = ?";
        $stmt = mysqli_prepare($connection, $query);
        if (!$stmt) {
            echo json_encode(['success' => false, 'message' => 'Database error. Please try again later.']);
            exit; 
        }
        mysqli_stmt_bind_param($stmt, "sssssssi", $firstname, $lastname, $email, $phone, $address, $sex, $birthdate, $lrn);
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