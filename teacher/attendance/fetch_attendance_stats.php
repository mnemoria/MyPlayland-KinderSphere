<?php
// fetch_attendance_stats.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $selectedDate = $_GET["selectedDate"];

    $stats_query = "SELECT
    COUNT(*) AS total_students,
    SUM(CASE WHEN a.attendance_status = 'Present' THEN 1 ELSE 0 END) AS present_count,
    SUM(CASE WHEN a.attendance_status = 'Late' THEN 1 ELSE 0 END) AS late_count,
    SUM(CASE WHEN a.attendance_status = 'Absent' THEN 1 ELSE 0 END) AS absent_count,
    COALESCE((
        SELECT COUNT(*) FROM student_info s
        WHERE NOT EXISTS (
            SELECT 1 FROM attendance a
            WHERE a.student_id = s.lrn AND a.date = ?
        )
    ), 0) AS unmarked_count
FROM attendance a
WHERE a.date = ?;";

    $stats_stmt = $connection->prepare($stats_query);
    $stats_stmt->bind_param("ss", $selectedDate, $selectedDate);
    $stats_stmt->execute();
    $stats_result = $stats_stmt->get_result();

    // Fetch the statistics row
    $stats_row = $stats_result->fetch_assoc();

    // Convert the response array to JSON and send it as the response
    header("Content-Type: application/json");
    echo json_encode($stats_row);
} else {
    $response = array("success" => false, "message" => "Invalid request method.");
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>