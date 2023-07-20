<?php
require_once 'server.php';

if (isset($_REQUEST['btn_login'])) {
    $email = $_REQUEST["txt_email"];
    $password = $_REQUEST["txt_password"];
    $role = $_REQUEST['txt_role'];

    if (empty($email)) {
        $errorMsg[] = "Please enter email";
    } else if (empty($password)) {
        $errorMsg[] = "Please enter password";
    } else {
        try {

            $tableName = $role;

            $select_stmt = $connection->prepare("SELECT email, password, role FROM $tableName WHERE email = ?"); 

            $select_stmt->bind_param("s", $email);
            $select_stmt->execute();

            $result = $select_stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $dbemail = $row["email"];
                $dbpassword = $row["password"];
                $dbrole = $row["role"];

                if ($password == $dbpassword) {

                    $_SESSION['role'] = $dbrole;
                    $_SESSION['isLoggedIn'] = true;

                    switch ($dbrole) {
                        case "admin":
                            $_SESSION["admin_login"] = $email;
                            $loginMsg = "Admin... Successfully Login...";
                            header("location:  ./home");
                            unset($email, $password, $role); 
                            break;
                        case "teacher":
                            $_SESSION["teacher_login"] = $email;
                            $loginMsg = "Teacher... Successfully Login...";
                            header("location:  ./home");
                            unset($email, $password, $role);
                            break;
                        case "student":
                            $_SESSION["student_login"] = $email;
                            $loginMsg = "Student... Successfully Login...";
                            header("location:  ./home");
                            unset($email, $password, $role);
                            break;
                    }
                } else {
                    $errorMsg[] = "Incorrect password";
                }
            } else {
                $errorMsg[] = "This account does not exist";
            }
        } catch (PDOException $e) {
            $errorMsg[] = $e->getMessage();
        }
    }
}
?>
