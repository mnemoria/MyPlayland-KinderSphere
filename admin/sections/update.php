<?php
include('../../backend/server.php');

// Retrieve Value
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $query = "SELECT * FROM class_info WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $response = array();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $response = $row;
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'No data found for the given ID.'));
    }

    // Close the prepared statements
    mysqli_stmt_close($stmt);
}

// Update Database
if(isset($_POST['hidden_data'])){
    $id = $_POST['hidden_data'];
    $name = $_POST['update_className'];
    $level = $_POST['update_classLevel'];
    $teacher_id = $_POST['update_teacher_id'];
    $status = $_POST['update_status'];

    $query = "UPDATE class_info SET class_name=?, class_level=?, teacher_id=?, status=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssisi", $name, $level, $teacher_id, $status, $id);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    $affectedRows = mysqli_affected_rows($connection);
    if ($affectedRows > 0) {
        echo("Class Successfully Updated!");
    } else {
        echo("Error: Class update failed.");
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

?>