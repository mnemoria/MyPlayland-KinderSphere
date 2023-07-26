<?php
include('../../backend/server.php');

// Get typed value for course input
$searchInput = isset($_GET['search_input']) ? $_GET['search_input'] : "";

// Prepare the SQL statement with the filter condition
$sql = "SELECT id, firstname, lastname FROM teacher_info";
if (!empty($searchInput)) {
    $searchInput = mysqli_real_escape_string($connection, $searchInput);
    $sql .= " WHERE firstname LIKE '%$searchInput%' OR lastname LIKE '%$searchInput%'";
}

$stmt = mysqli_prepare($connection, $sql);

// Execute the prepared statement
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $id, $firstname, $lastname);

// Fetch all courses into an array
$teacher = array();
while (mysqli_stmt_fetch($stmt)) {
    $teacher[] = array(
        'id' => $id,
        'firstname' => $firstname,
        'lastname' => $lastname
    );
}

// Close the statement
mysqli_stmt_close($stmt);
mysqli_close($connection); 

// Set the response header to JSON format
header('Content-Type: application/json');

// Output the result as JSON
echo json_encode($teacher);
?>
