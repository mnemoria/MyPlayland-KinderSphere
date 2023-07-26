<?php
include('../../backend/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['code']) && isset($_POST['name']) && isset($_POST['course']) && isset($_POST['date']) && isset($_POST['status'])) {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $course = $_POST['course'];
        $date = $_POST['date'];
        $status = $_POST['status'];
        
        // Check if the course code already exists
        $checkQuery = "SELECT * FROM subject_info WHERE subject_code = ?";
        $stmt = mysqli_prepare($connection, $checkQuery);
        mysqli_stmt_bind_param($stmt, "s", $code);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) > 0) {
            echo "Subject code \"" . $code . "\" already exists";
            exit();
        } else {
            $insertQuery = "INSERT INTO subject_info (subject_code, subject_name, course_id, date_added, status) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($connection, $insertQuery);
            mysqli_stmt_bind_param($insertStmt, "ssiss", $code, $name, $course, $date, $status);
    
            if (mysqli_stmt_execute($insertStmt)) {
                echo("Course code \"" . $code . "\" Successfully Added!");
                exit();
            } else {
                echo("Error occurred while adding course code \"" . $code);
                exit();
            }
        }

        // Close the prepared statements
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($insertStmt);   
    } else {
        echo("No data received.");
    }
}

// Close the database connection
mysqli_close($connection); 

?>