<?php
// fetch_attendance.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $selectedDate = $_GET["selectedDate"];

    $query = "SELECT s.lrn, s.firstname, s.lastname, a.attendance_status, a.remarks
              FROM student_info s
              LEFT JOIN attendance a ON s.lrn = a.student_id AND a.date = ?";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();
    $attendance = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    mysqli_close($connection);

    header("Content-Type: application/json");
    echo json_encode($attendance);
} else {
    $response = array("success" => false, "message" => "Invalid request method.");
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>