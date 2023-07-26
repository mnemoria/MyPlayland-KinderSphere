<?php
include('../../backend/server.php');

// Pagination settings
$entriesPerPage = 10;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $entriesPerPage;

// Get search input and filter status
$searchInput = isset($_GET['search_input']) ? $_GET['search_input'] : "";
$filterStatus = isset($_GET['filter_status']) ? $_GET['filter_status'] : "";

// WHERE clause for search and filter
$whereClause = "";
if (!empty($searchInput)) {
    $searchInput = mysqli_real_escape_string($connection, $searchInput);
    $whereClause .= " WHERE name LIKE '%$searchInput%' or course_code LIKE '%$searchInput%'";
}

if (!empty($filterStatus) && $filterStatus !== 'All') {
    if (!empty($whereClause)) {
        $whereClause .= " AND ";
    } else {
        $whereClause .= " WHERE ";
    }
    $filterStatus = mysqli_real_escape_string($connection, $filterStatus);
    $whereClause .= "status = '$filterStatus'";
}

// Fetch data from the database
$query = "SELECT * FROM course_info" . $whereClause . " LIMIT ?, ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "ii", $offset, $entriesPerPage);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Create an array to hold the data
$data = array();
$num = $offset;
while ($row = mysqli_fetch_assoc($result)) {
    $num++;
    $row['num'] = $num;
    $data[] = $row;
}

// "All" filter
if ($filterStatus === 'All') {
    $allQuery = "SELECT COUNT(*) AS total FROM course_info";
    $allResult = $connection->query($allQuery);
    $totalRecords = $allResult->fetch_assoc()['total'];

    // Calculate the starting value for the counter variable based on the current page and entries per page
    $startingNum = ($currentPage - 1) * $entriesPerPage;

    // Fetch all data without applying any filter
    $allQuery = "SELECT * FROM course_info LIMIT ?, ?";
    $allStmt = mysqli_prepare($connection, $allQuery);
    mysqli_stmt_bind_param($allStmt, "ii", $startingNum, $entriesPerPage);
    mysqli_stmt_execute($allStmt);
    $result = mysqli_stmt_get_result($allStmt);

    // Update the array to hold the data for the response
    $data = array();
    $num = $startingNum; // Set the counter variable to the starting value
    while ($row = mysqli_fetch_assoc($result)) {
        $num++;
        $row['num'] = $num;
        $data[] = $row;
    }   
} else {
    // Count total number of records with the specific filter
    $totalRecordsQuery = "SELECT COUNT(*) AS total FROM course_info" . $whereClause;
    $totalRecordsResult = $connection->query($totalRecordsQuery);
    $totalRecords = $totalRecordsResult->fetch_assoc()['total'];
}

// Calculate total pages
$totalPages = ceil($totalRecords / $entriesPerPage);

// response data
$response = array(
    'page' => $currentPage,
    'total_pages' => $totalPages,
    'total_records' => $totalRecords,
    'records' => $data
);

// Close the prepared statements
mysqli_stmt_close($stmt);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
