<?php
include('../../backend/server.php');

// Retrieve Value
if (isset($_POST['teacher_id'])) {
    $teacher_id = $_POST['teacher_id'];

    $query = "SELECT firstname, lastname FROM teacher_info WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $teacher_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $response = array();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $response = $row;
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'No data found for the given teacher_id.'));
    }

    // Close the prepared statements
    mysqli_stmt_close($stmt);
}
?>
