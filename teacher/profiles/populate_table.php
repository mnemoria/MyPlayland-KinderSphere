<?php
include('../../backend/server.php');

// Fetch data from the student_info table
$sql = "SELECT lastname, firstname, email, sex, status, phone, lrn FROM student_info";
$result = mysqli_query($connection, $sql);

// Prepare an array to hold the data
$students = array();
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}

// Return the data as a JSON array
header('Content-Type: application/json');
echo json_encode($students);
?>
