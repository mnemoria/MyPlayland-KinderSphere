<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/database.php';

function createStudent($name, $surname, $email, $phone, $address, $sex, $birthdate) {
    global $connection;
    $query = "INSERT INTO students (name, surname, email, phone, address, sex, birthdate) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $surname, $email, $phone, $address, $sex, $birthdate);
    return mysqli_stmt_execute($stmt);
}

function getStudent($email) {
    global $connection;
    $query = "SELECT * FROM students WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function updateStudent($name, $surname, $email, $phone, $address, $sex, $birthdate) {
    global $connection;
    $query = "UPDATE students SET name = ?, surname = ?, phone = ?, address = ?, sex = ?, birthdate = ? WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $name, $surname, $phone, $address, $sex, $birthdate, $email);
    return mysqli_stmt_execute($stmt);
}

// Handle the update request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['updateStudent'])
        // Add other required fields as needed...
    ) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sex = $_POST['sex'];
        $birthdate = $_POST['birthdate'];

        // Perform any necessary validation on the data (e.g., check for empty values, sanitize input, etc.)

        // Call the updateStudent function to update the student data
        $updateResult = updateStudent($email, $name, $surname, $phone, $address, $sex, $birthdate);

        // Return the result as JSON response
        echo json_encode($updateResult);
        exit(); // Stop execution
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit(); // Stop execution
    }
}

function deleteStudent($email) {
    global $connection;
    $query = "DELETE FROM students WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    return mysqli_stmt_execute($stmt);
}

