<?php
// Include database connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

// Get form data
$studentId = $_POST['student_id'];
$activityId = $_POST['activity_id'];
$score = $_POST['activity_score'];

// Update the score in the database
$updateQuery = "UPDATE activity_info SET activity_score = '$score' WHERE id = '$activityId' AND student_id = '$studentId'";
$result = mysqli_query($connection, $updateQuery);

// Prepare response message
if ($result) {
    $response = ["message" => "Score updated successfully!"];
} else {
    $response = ["message" => "Failed to update score. Please try again."];
}

// Send JSON response
header("Content-Type: application/json");
echo json_encode($response);
?>
