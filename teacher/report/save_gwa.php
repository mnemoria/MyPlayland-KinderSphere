<?php
// Connect to the database
    require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and validate the inputs (to prevent SQL injection)
        $lrn = mysqli_real_escape_string($connection, $_POST['lrn']);
        $gwa = floatval($_POST['gwa']);

        // Perform the update in the database
        $query = "UPDATE student_info SET gwa = $gwa WHERE lrn = '$lrn'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // GWA update successful
            echo "Success";
        } else {
            // GWA update failed
            echo "Error updating GWA: " . mysqli_error($connection);
        }
    }
?>
