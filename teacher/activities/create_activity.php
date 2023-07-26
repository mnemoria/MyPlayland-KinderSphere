<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['date']) &&
        isset($_POST['activity_num']) &&
        isset($_POST['activity_name']) &&
        isset($_POST['activity_desc']) &&
        isset($_POST['activity_total_points']) &&
        isset($_POST['subject_id'])
        // Add other required fields as needed...
    ) {
        $date = trim($_POST['date']);
        $activity_num = trim($_POST['activity_num']);
        $activity_name = trim($_POST['activity_name']);
        $activity_desc = trim($_POST['activity_desc']);
        $activity_total_points = trim($_POST['activity_total_points']);
        $subject_id = trim($_POST['subject_id']);

        // include 'validate_student.php';

        $query = "INSERT INTO activity_info (date, activity_num, activity_name, activity_desc, activity_total_points, subject_id) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        if (!$stmt) {
            echo json_encode(['success' => false, 'message' => 'Database error. Please try again later.']);
            exit; 
        }
        mysqli_stmt_bind_param($stmt, "sissii", $date, $activity_num, $activity_name, $activity_desc, $activity_total_points, $subject_id);
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