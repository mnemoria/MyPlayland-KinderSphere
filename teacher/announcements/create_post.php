<?php
include('../../backend/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['heading']) && isset($_POST['content'])) {
        $heading = mysqli_real_escape_string($connection, $_POST['heading']);
        $content = mysqli_real_escape_string($connection, $_POST['content']);
        
        $query = "INSERT INTO announcement (heading, content) VALUES (?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $heading, $content);

        if (mysqli_stmt_execute($stmt)) {
            echo("Post Added!");
            exit();
        } else {
            echo("Error occurred");
            exit();
        }

        // Close the prepared statements
        mysqli_stmt_close($stmt);
    } else {
        echo("No data received.");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $query2 = "SELECT * FROM announcement ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connection, $query2);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $heading = $row['heading'];
        $content = $row['content'];
    } else {
        $heading = "";
        $content = "";
    }
}

// Close the database connection
mysqli_close($connection); 

?>