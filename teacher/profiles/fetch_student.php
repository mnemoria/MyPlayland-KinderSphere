<?php
// fetch_student.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

// Check if the studentID parameter is set in the POST request
if (isset($_POST['studentID'])) {
    $id = $_POST['studentID'];

    // Change this to studentinfo
    $stmt = $connection->prepare("SELECT * FROM student WHERE student_id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        echo json_encode($student);
    } else {
        echo json_encode(array('error' => 'Student not found'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}