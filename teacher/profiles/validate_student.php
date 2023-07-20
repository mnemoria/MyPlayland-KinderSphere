<?php

{

// Validate the required fields (non-empty)
if (empty($name) || empty($surname) || empty($email) || empty($phone) || empty($address) || empty($sex) || empty($birthdate)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}
    // Validate phone number (allowing only digits and specific characters)
if (!preg_match('/^[0-9()+-]+$/', $phone)) {
    echo json_encode(['success' => false, 'message' => 'Invalid phone number format.']);
    exit;
}

// Validate sex (allowing only 'Male' or 'Female')
if ($sex !== 'Male' && $sex !== 'Female') {
    echo json_encode(['success' => false, 'message' => 'Invalid sex value.']);
    exit;
}

// Validate birthdate format (YYYY-MM-DD)
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
    echo json_encode(['success' => false, 'message' => 'Invalid birthdate format.']);
    exit;
}

// Ensure that the birthdate is not in the future
if (strtotime($birthdate) > time()) {
    echo json_encode(['success' => false, 'message' => 'Birthdate cannot be in the future.']);
    exit;
}



// Perform additional validation on specific fields
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
    exit;
}}

?>