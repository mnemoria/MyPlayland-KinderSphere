<?php
include('../../backend/server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $date_added = $_POST['date_added'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $marital_status = $_POST['maritalStatus'];
    $em_status = $_POST['emStatus'];
    $teacher_no = $_POST['teacherNo'];
    $address = $_POST['address'];

    // Check if the course code already exists
    $checkQuery = "SELECT * FROM teacher_info WHERE teacher_no = ?";
    $stmt = mysqli_prepare($connection, $checkQuery);
    mysqli_stmt_bind_param($stmt, "s", $teacher_no);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "Teacher \"" . $teacher_no . "\" already exists";
        exit();
    } else {

        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Handle image upload and convert the image to BLOB data
        $profileImage = $_FILES['profileImage']['tmp_name'];
        $profileImageData = file_get_contents($profileImage);

        // Insert the data into the database using prepared statements
        $insertStmt = $connection->prepare("INSERT INTO teacher_info (date_added, firstname, lastname, sex, email, password, phone, birthdate, marital_status, employment_status, teacher_no, address, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters to the prepared statement
        $insertStmt->bind_param("sssssssssssss", $date_added, $first_name, $last_name, $sex, $email, $hashed_password, $phone, $birthdate, $marital_status, $em_status, $teacher_no, $address, $profileImageData);

        // Execute the prepared statement
        if ($insertStmt->execute()) {
            echo("Teacher " . $first_name . " was inserted successfully.");
        } else {
            echo("Error occurred while adding teacher " . $first_name);
        }
    }

    // Close the prepared statement
    $stmt->close();
    $insertStmt->close();
}

// Close the database connection
mysqli_close($connection); 
?>
