<?php
// fetch_student.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

// Check if the studentEmail parameter is set in the POST request
// Change this to student ID
if (isset($_POST['studentEmail'])) {
    $email = $_POST['studentEmail'];

    // Change this to studentinfo
    $stmt = $connection->prepare("SELECT * FROM studinfo WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Return the student data as JSON
        echo json_encode(array(
            'name' => $student['name'],
            'surname' => $student['surname'],
            'email' => $student['email'],
            'phone' => $student['phone'],
            'address' => $student['address'],
            'sex' => $student['sex'],
            // Include other data fields here...
        ));
    } else {
        // Student not found, return an error message as JSON
        echo json_encode(array('error' => 'Student not found'));
    }
} else {
    // If studentEmail parameter is not set, return an error message as JSON
    echo json_encode(array('error' => 'Invalid request'));
}