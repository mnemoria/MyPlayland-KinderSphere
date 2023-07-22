<?php include "../base-start.php" ?>

<?php
// activities.php

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if (isset($_SESSION['student_id'])) {
    // Access the student_id
    $student_id = $_SESSION['student_id'];

    // Query to fetch subjects and their activities for the current student
    $sql = "SELECT s.subject_id, s.subject_name, a.activity_num, a.activity_name, a.activity_desc
            FROM subjects s
            LEFT JOIN activities a ON s.subject_id = a.subject_id AND a.student_id = ?
            ORDER BY s.subject_id";

    // Use prepared statement
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $student_id);
    mysqli_stmt_execute($stmt);

    // Get the results
    $result = mysqli_stmt_get_result($stmt);

    $data = array();

    if (mysqli_num_rows($result) > 0) {
        $current_subject_id = null;
        $subject_activities = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $subject_id = $row['subject_id'];
            $subject_name = $row['subject_name'];

            // If a new subject is encountered, add the previous subject activities to the data array
            if ($subject_id !== $current_subject_id && $current_subject_id !== null) {
                $data[] = array(
                    'subject_id' => $current_subject_id,
                    'subject_name' => $subject_name,
                    'activities' => $subject_activities
                );

                // Reset subject_activities for the new subject
                $subject_activities = array();
            }

            $activity_num = $row['activity_num'];
            $activity_name = $row['activity_name'];
            $activity_desc = $row['activity_desc'];

            $subject_activities[] = array(
                'activity_num' => $activity_num,
                'activity_name' => $activity_name,
                'activity_desc' => $activity_desc
            );

            $current_subject_id = $subject_id;
        }

        // Add the last subject's activities to the data array
        $data[] = array(
            'subject_id' => $current_subject_id,
            'subject_name' => $subject_name,
            'activities' => $subject_activities
        );
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'student_id not set!'));
}
?>
