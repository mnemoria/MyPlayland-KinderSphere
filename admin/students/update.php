<?php
include('../../backend/server.php');

// Retrieve Value
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $query = "SELECT * FROM student_info WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $response = array();

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
    $class_id = $_POST['update_selected_class_id'];
    $date_added = $_POST['update_date_added'];
    $first_name = $_POST['update_firstName'];
    $last_name = $_POST['update_lastName'];
    $sex = $_POST['update_sex'];
    $email = $_POST['update_email'];
    $phone = $_POST['update_phone'];
    $birthdate = $_POST['update_birthdate'];
    $parentName = $_POST['update_parentName'];
    $en_status = $_POST['update_enStatus'];
    $update_LRN = $_POST['update_LRN'];
    $address = $_POST['update_address'];

    $query = "UPDATE student_info SET class_id=?, date_added=?, firstname=?, lastname=?, sex=?, email=?, phone=?, birthdate=?, parent_name=?, status=?, lrn=?, address=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "isssssssssssi", $class_id, $date_added, $first_name, $last_name, $sex, $email, $phone, $birthdate, $parentName, $en_status, $update_LRN, $address, $id);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    $affectedRows = mysqli_affected_rows($connection);
    if ($affectedRows > 0) {
        echo("Student Successfully Updated!");
    } else {
        echo("Error: Student update failed.");
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

?>