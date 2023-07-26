<?php
include('../../backend/server.php');

// Retrieve Value
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $query = "SELECT * FROM teacher_info WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Convert the blob image data to a base64-encoded string
        $imageData = base64_encode($row['picture']);
        $row['picture'] = $imageData;
        
        $response = $row;
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'No data found for the given ID.'));
    }

    // Close the prepared statements
    mysqli_stmt_close($stmt);
}
// Update Database
if(isset($_POST['hidden_data'])){
    $id = $_POST['hidden_data'];
    $date_added = $_POST['update_date_added'];
    $first_name = $_POST['update_firstName'];
    $last_name = $_POST['update_lastName'];
    $sex = $_POST['update_sex'];
    $email = $_POST['update_email'];
    $phone = $_POST['update_phone'];
    $birthdate = $_POST['update_birthdate'];
    $marital_status = $_POST['update_maritalStatus'];
    $em_status = $_POST['update_emStatus'];
    $teacher_no = $_POST['update_teacherNo'];
    $address = $_POST['update_address'];

    $query = "UPDATE teacher_info SET date_added=?, firstname=?, lastname=?, sex=?, email=?, phone=?, birthdate=?, marital_status=?, employment_status=?, teacher_no=?, address=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssi", $date_added, $first_name, $last_name, $sex, $email, $phone, $birthdate, $marital_status, $em_status, $teacher_no, $address, $id);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    $affectedRows = mysqli_affected_rows($connection);
    if ($affectedRows > 0) {
        echo("Teacher Successfully Updated!");
    } else {
        echo("Error: Teacher update failed.");
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

?>