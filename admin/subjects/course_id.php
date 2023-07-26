<?php
include('../../backend/server.php');

// Get typed value for course input
$searchInput = isset($_GET['search_input']) ? $_GET['search_input'] : "";

// Prepare the SQL statement with the filter condition
$sql = "SELECT id, course_code, name FROM course_info";
if (!empty($searchInput)) {
    $searchInput = mysqli_real_escape_string($connection, $searchInput);
    $sql .= " WHERE name LIKE '%$searchInput%' OR course_code LIKE '%$searchInput%'";
}

$stmt = mysqli_prepare($connection, $sql);

// Execute the prepared statement
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $course_id, $course_code, $course_name);

// Fetch all courses into an array
$courses = array();
while (mysqli_stmt_fetch($stmt)) {
    $courses[] = array(
        'id' => $course_id,
        'code' => $course_code,
        'name' => $course_name
    );
}

// Close the statement
mysqli_stmt_close($stmt);
mysqli_close($connection); 

// Set the response header to JSON format
header('Content-Type: application/json');

// Output the result as JSON
echo json_encode($courses);
?>
