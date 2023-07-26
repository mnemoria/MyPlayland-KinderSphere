<?php
include('../../backend/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['announcement_id'])) {
    $announcementId = $_POST['announcement_id'];

    // Create a query to delete the announcement from the database
    $query = "DELETE FROM announcement WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $announcementId);

    $response = array();

    if (mysqli_stmt_execute($stmt)) {
        echo 'Announcement deleted successfully.';
    } else {
        echo 'Error occurred while deleting announcement.';
    }

    // Close the prepared statements
    mysqli_stmt_close($stmt);
} else {
    echo("No data received.");
}

// Close the database connection
mysqli_close($connection);
?>
