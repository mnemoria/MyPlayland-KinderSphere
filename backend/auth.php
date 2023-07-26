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

            $tableName = $role . '_info';

            $select_stmt = $connection->prepare("SELECT * FROM $tableName WHERE email = ?"); 

            $select_stmt->bind_param("s", $email);
            $select_stmt->execute();

            $result = $select_stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $dbemail = $row["email"];
                $dbpassword = $row["password"];
                $dbrole = $row["role"];
                $db_id = $row["id"];

                if (password_verify($password, $dbpassword)) {

                    $_SESSION['role'] = $dbrole;
                    $_SESSION['isLoggedIn'] = true;

                    switch ($dbrole) {
                        case "teacher":
                            $stmt = $connection->prepare("SELECT id FROM class_info WHERE teacher_id = ?"); 

                            $stmt->bind_param("i", $db_id);
                            $stmt->execute();

                            $res = $stmt->get_result();

                            if ($res->num_rows > 0) {
                                $row = $res->fetch_assoc();
                                $db_class_id = $row["id"];
                                $_SESSION['class_id'] = $db_class_id;
                                $_SESSION["teacher_login"] = $email;
                                $_SESSION['teacher_id'] = $db_id;
                                $loginMsg = "Teacher... Successfully Login...";
                                header("location:  ./home");
                                unset($email, $password, $role);
                            }
                            break;

                        case "student":
                            $db_class_id = $row["class_id"];
                            $_SESSION['class_id'] = $db_class_id;
                            $_SESSION["student_login"] = $email;
                            $_SESSION['student_id'] = $db_id;
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