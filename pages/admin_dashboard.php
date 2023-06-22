<?php
    session_start();

    if (isset($_SESSION['username'])) { 
?>

        <!DOCTYPE html>
        <html>
            <h1>dashboard</h1>
            <a href = "admin_logout.php">Logout</a>
        </html>

<?php 
    } else{
        header("Location: admin_login.php");
        exit();
    }
?>