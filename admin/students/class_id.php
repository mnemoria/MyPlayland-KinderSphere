<?php
include('../../backend/server.php');

// Get typed value for course input
$searchInput = isset($_GET['search_input']) ? $_GET['search_input'] : "";

// Prepare the SQL statement with the filter condition
$sql = "SELECT id, class_level, class_name FROM class_info";
if (!empty($searchInput)) {
    $searchInput = mysqli_real_escape_string($connection, $searchInput);
    $sql .= " WHERE class_level LIKE '%$searchInput%' OR class_name LIKE '%$searchInput%'";
}

$stmt = mysqli_prepare($connection, $sql);

// Execute the prepared statement
mysqli_stmt_execute($stmt);
    
// Bind the result variables
mysqli_stmt_bind_result($stmt, $id, $class_level, $class_name);

// Fetch all courses into an array
$classes = array();
while (mysqli_stmt_fetch($stmt)) {
    $classes[] = array(
        'id' => $id,
        'class_level' => $class_level,
        'class_name' => $class_name
    );
}

// Close the statement
mysqli_stmt_close($stmt);
mysqli_close($connection); 

// Set the response header to JSON format
header('Content-Type: application/json');

// Output the result as JSON
echo json_encode($classes);
?>
