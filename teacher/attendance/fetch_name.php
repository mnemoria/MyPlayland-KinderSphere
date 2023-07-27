<?php
include('../../backend/server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['class_id'])) {
    $class_id = $_POST['class_id'];

    // Query to fetch class_level and class_name based on class_id
    // Replace 'your_table_name' with the actual table name where class_info is stored
    $query = "SELECT class_level, class_name FROM class_info WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $class_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $class_info = array();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $class_info = array(
            "class_level" => $row['class_level'],
            "class_name" => $row['class_name']
        );
    }

    // Close the prepared statements
    mysqli_stmt_close($stmt);

    // Return the response as JSON
    header("Content-Type: application/json");
    echo json_encode($class_info);
} else {
    // Return an empty response as JSON
    header("Content-Type: application/json");
    echo json_encode(array());
}

// Close the database connection (assuming you have a connection established here)
mysqli_close($connection);
?>
