<?php
include('../../backend/server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_class_id = $_POST['selected_class_id'];
    $date_added = $_POST['date_added'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $parent_name = $_POST['parentName'];
    $en_status = $_POST['enStatus'];
    $LRN = $_POST['LRN'];
    $address = $_POST['address'];
    $role = "student";

    // Check if the LRN already exists
    $checkQuery = "SELECT * FROM student_info WHERE lrn = ?";
    $stmt = mysqli_prepare($connection, $checkQuery);
    mysqli_stmt_bind_param($stmt, "s", $LRN);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "Student \"" . $LRN . "\" already exists";
        exit();
    } else {

        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Handle image upload and convert the image to BLOB data
        $profileImage = $_FILES['profileImage']['tmp_name'];
        $profileImageData = file_get_contents($profileImage);

        // Insert the data into the database using prepared statements
        $insertStmt = $connection->prepare("INSERT INTO student_info (class_id, date_added, firstname, lastname, sex, email, password, phone, birthdate, parent_name, lrn, address, picture, role, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters to the prepared statement
        $insertStmt->bind_param("issssssssssssss",$selected_class_id,  $date_added, $first_name, $last_name, $sex, $email, $hashed_password, $phone, $birthdate, $parent_name, $LRN, $address, $profileImageData, $role, $en_status);

        // Execute the prepared statement
        if ($insertStmt->execute()) {
            echo("Student " . $first_name . " was inserted successfully.");
        } else {
            echo("Error occurred while adding Student " . $first_name);
        }
    }

    // Close the prepared statement
    $stmt->close();
    $insertStmt->close();
}

// Close the database connection
mysqli_close($connection); 
?>
