<?php
// update_score.php

// Assuming you have already included your database connection code
// require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if (isset($_POST['addScore'])) {
    // Collect form data
    $id = $_POST['id'];
    $score = $_POST['score'];

    // Perform some validation on the received data if necessary...

    // Update the score in the database using a prepared statement
    $sql = "UPDATE activity_info SET activity_score = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $sql);

    if ($stmt) {
        // Bind the variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "di", $score, $id);

        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Score update successful
            // Assuming you have retrieved the new score from the database after the update, you can include it in the response
            $new_score = $score; // Replace with the actual new score value

            // Send the new score as a JSON response
            $response = array('new_score' => $new_score);
            echo json_encode($response);
        } else {
            // Score update failed
            // Handle the error if needed
            $response = array('error' => 'Score update failed.');
            echo json_encode($response);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Prepare statement failed
        // Handle the error if needed
        $response = array('error' => 'Prepare statement failed.');
        echo json_encode($response);
    }
}
?>
