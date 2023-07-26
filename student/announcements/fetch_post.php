<?php
include('../../backend/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['class_id'])) {
    $class_id = $_POST['class_id'];

    $query = "SELECT id, heading, content FROM announcement WHERE class_id = ? AND heading <> '' AND content <> ''";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $class_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $announcements = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $announcements[] = array(
                "id" => $row['id'],
                "heading" => $row['heading'],
                "content" => nl2br($row['content'])
            );
        }
    }

    // Close the prepared statements
    mysqli_stmt_close($stmt);

    // Return the response as JSON
    header("Content-Type: application/json");
    echo json_encode(array("records" => $announcements));
} else {
    // Return an empty response as JSON
    header("Content-Type: application/json");
    echo json_encode(array("records" => array()));
}

// Close the database connection
mysqli_close($connection);
?>
