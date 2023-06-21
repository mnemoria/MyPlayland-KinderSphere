<?php 
    session_start();
    $userRole = 'admin';
    $title = 'Login';
    include 'head.php' 
?>

<!DOCTYPE html>
<html lang="en">
  <body style="background: #377557;">
  <?php 
    if (isset($_SESSION['userRole'])) {
        $userRole = $_SESSION['userRole'];
        include $userRole . '_sidebar' . '.php';
        include  $userRole . '_dashboard' . '.php';
    } else {
        include 'login.php';
    }
   ?>
  </body>
</html>

<?php
// Simulated authentication - Replace this with your actual authentication logic
// function authenticateUser($username, $password)
// {
//     // Your authentication logic here
//     // Authenticate the user based on their credentials and retrieve user data
//     // For example, query a database or use an authentication library

//     // Return user data (including the role) if authentication is successful
//     // Return false if authentication fails
//     // In this example, we simulate authentication with predefined credentials

//     // Simulated user data with roles
//     $users = [
//         'admin' => [
//             'password' => 'admin123',
//             'role' => 'admin',
//         ],
//         'teacher' => [
//             'password' => 'teacher123',
//             'role' => 'teacher',
//         ],
//         'student' => [
//             'password' => 'student123',
//             'role' => 'student',
//         ],
//     ];

//     // Check if user exists and password is correct
//     if (isset($users[$username]) && $users[$username]['password'] === $password) {
//         // Authentication successful, return user role
//         return $users[$username]['role'];
//     }

//     // Authentication failed
//     return false;
// }

// // Example usage
// session_start();

// // Check if the user is already authenticated
// if (isset($_SESSION['userRole'])) {
//     // User is authenticated, proceed to render the appropriate page based on the user role
//     $userRole = $_SESSION['userRole'];
//     // Include the appropriate sidebar and content based on the user role
//     include $userRole . '_sidebar' . '.php';
//     include  $userRole . '_dashboard' . '.php';
//     exit; // Stop further execution
// }

// // If the user is not authenticated, redirect to the login page
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Form submission, perform authentication
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $userRole = authenticateUser($username, $password);

//     if ($userRole) {
//         // Authentication successful
//         // Store the user role in the session
//         $_SESSION['userRole'] = $userRole;
//         // Redirect to the index page to render the appropriate sidebar and content
//         header('Location: index.php');
//         exit; // Stop further execution
//     } else {
//         // Authentication failed
//         // Handle invalid credentials or redirect to login page with an error message
//     }
// } else {
//     // Render the login page
//     include 'login.php';
// }
?>



