<?php
include('../../backend/server.php');

// Retrieve Value
if (isset($_POST['class_id'])) {
    $class_id = $_POST['class_id'];

    $query = "SELECT class_level, class_name FROM class_info WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $class_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $response = array();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $response = $row;
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'No data found for the given class_id.'));
    }

    // Close the prepared statements
    mysqli_stmt_close($stmt);
}
?>
