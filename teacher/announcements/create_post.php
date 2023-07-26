<?php
include('../../backend/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['heading']) && isset($_POST['content'])) {
        $heading = mysqli_real_escape_string($connection, $_POST['heading']);
        $content = mysqli_real_escape_string($connection, $_POST['content']);

        $class_id = $_POST['class_id'];

        $query = "INSERT INTO announcement (heading, content, class_id) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ssi", $heading, $content, $class_id);

        if (mysqli_stmt_execute($stmt)) {
            echo("Post Added!");
            exit();
        } else {
            echo("Error occurred");
            exit();
        }

        // Close the prepared statements
        mysqli_stmt_close($stmt);

    }
}

// Close the database connection
mysqli_close($connection);

?>