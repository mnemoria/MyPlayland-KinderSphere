<?php
// Connect to the database and handle form submission
require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $subjectId = $_POST['subject_id'];
    $activityNum = $_POST['activity_num'];
    $activityName = $_POST['activity_name'];
    $activityDesc = $_POST['activity_desc'];
    $activityTotalPts = $_POST['activity_total_pts'];
    $date = $_POST['date'];

    // Insert the activity data into the activity_info table
    $query = "INSERT INTO activity_info (subject_id, activity_num, activity_name, activity_desc, activity_total_pts, date)
              VALUES ('$subjectId', '$activityNum', '$activityName', '$activityDesc', '$activityTotalPts', '$date')";

    if (mysqli_query($connection, $query)) {
        echo "Success";
    } else {
        echo "Error inserting activity: " . mysqli_error($connection);
    }
}
?>
