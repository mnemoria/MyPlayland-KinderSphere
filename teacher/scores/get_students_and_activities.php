<?php
// Include database connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

// Fetch students
$studentQuery = "SELECT id, firstname, lastname FROM student_info";
$studentResult = mysqli_query($connection, $studentQuery);

// Fetch activities
$activityQuery = "SELECT id, activity_name FROM activity_info";
$activityResult = mysqli_query($connection, $activityQuery);

// Build options for students and activities dropdowns
$studentsOptions = "";
$activitiesOptions = "";

while ($student = mysqli_fetch_assoc($studentResult)) {
    $studentsOptions .= "<option value='{$student['id']}'>{$student['firstname']} {$student['lastname']}</option>";
}

while ($activity = mysqli_fetch_assoc($activityResult)) {
    $activitiesOptions .= "<option value='{$activity['id']}'>{$activity['activity_name']}</option>";
}

// Prepare data for JSON response
$data = [
    "students" => $studentsOptions,
    "activities" => $activitiesOptions,
];

// Send JSON response
header("Content-Type: application/json");
echo json_encode($data);
?>
