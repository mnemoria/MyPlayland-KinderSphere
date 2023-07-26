<?php
// fetch_students.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

$query = mysqli_query($connection, "SELECT * FROM student_info") or die('query failed');
$students = array();

if (mysqli_num_rows($query) > 0) {
    while ($fetch_student = mysqli_fetch_assoc($query)) {
        $students[] = $fetch_student;
    }
}

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode($students);
?>