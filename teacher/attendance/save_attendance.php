<?php
// save_attendance.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $attendanceData = json_decode(file_get_contents("php://input"), true);

    if (is_array($attendanceData) && !empty($attendanceData)) {

        // Prepare the SQL query with the ON DUPLICATE KEY UPDATE clause
        $stmt = $connection->prepare("INSERT INTO attendance (student_id, date, attendance_status, remarks)
                                     VALUES (?, ?, ?, ?)
                                     ON DUPLICATE KEY UPDATE attendance_status = VALUES(attendance_status), remarks = VALUES(remarks)");

        foreach ($attendanceData as $attendance) {
            $studentId = $attendance["student_id"];
            $date = $attendance["date"];
            $status = $attendance["attendance_status"];
            $remarks = $attendance["remarks"];

            $stmt->bind_param("ssss", $studentId, $date, $status, $remarks);
            $stmt->execute();
        }

        $stmt->close();
        mysqli_close($connection);

        $response = array("success" => true, "message" => "Attendance data saved successfully.");
        header("Content-Type: application/json");
        echo json_encode($response);
    } else {
        $response = array("success" => false, "message" => "Invalid attendance data.");
        header("Content-Type: application/json");
        echo json_encode($response);
    }
} else {
    $response = array("success" => false, "message" => "Invalid request method.");
    header("Content-Type: application/json");
    echo json_encode($response);
}
?>