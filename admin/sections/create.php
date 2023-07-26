<?php
include('../../backend/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['class_name']) && isset($_POST['class_level']) && isset($_POST['teacher']) && isset($_POST['status'])) {
        $class_name = $_POST['class_name'];
        $class_level = $_POST['class_level'];
        $teacher = $_POST['teacher'];
        $status = $_POST['status'];
        $level_code;
        
        // Check if the course code already exists
        $checkQuery = "SELECT * FROM class_info WHERE class_name = ?";
        $stmt = mysqli_prepare($connection, $checkQuery);
        mysqli_stmt_bind_param($stmt, "s", $class_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) > 0) {
            echo "Class \"" . $class_name . "\" already exists";
            exit();
        } else {
            // Assign level code
            switch($class_level){
                case 'Nursery': $level_code = 1; break;
                case 'Kindergarten 1': $level_code = 2; break;
                case 'Kindergarten 2': $level_code = 3; break;
            }

            $insertQuery = "INSERT INTO class_info (class_name, class_level, teacher_id, status, level_code) VALUES (?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($connection, $insertQuery);
            mysqli_stmt_bind_param($insertStmt, "ssisi", $class_name, $class_level, $teacher, $status, $level_code);
    
            if (mysqli_stmt_execute($insertStmt)) {
                echo("Class \"" . $class_name . "\" Successfully Added!");
                exit();
            } else {
                echo("Error occurred while adding class \"" . $class_name);
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