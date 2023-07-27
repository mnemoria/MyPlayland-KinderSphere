<?php
session_start();
// Assuming you have already established a database connection
// Replace 'your_database_connection' with your actual database connection code
var_dump($_SESSION['student_id']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a session or authentication mechanism in place to get the student's ID
    if (isset($_SESSION['student_id']) && isset($_SESSION['class_id'])) {
        $student_id = $_SESSION['student_id'];
        $class_id = $_SESSION['class_id'];

        // Sanitize the input for security (You can use better sanitization and validation methods based on your needs)
        $feedback = htmlspecialchars($_POST['feedback']);

        // Insert the feedback into the database (Assuming you have already defined connection and error handling)
        $insert_sql = "INSERT INTO feedback_table (student_id, class_id, feedback_text, date_added)
                       VALUES (?, ?, ?, NOW())
                       ON DUPLICATE KEY UPDATE feedback_text = VALUES(feedback_text), date_added = NOW()";

        $stmt = $connection->prepare($insert_sql);
        $stmt->bind_param("iis", $student_id, $class_id, $feedback);

        if ($stmt->execute()) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error submitting feedback.";
        }
    } else {
        echo "Session error: Student ID not found.";
    }
}
?>
