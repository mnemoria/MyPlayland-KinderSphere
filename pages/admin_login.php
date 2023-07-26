<?php 

    include __DIR__ . '../../base/start.php';

    $title = "Admin Login";
	include('server.php');
	include('head.php');

    if(isset($_SESSION['admin_login'])) {
        header("Location: admin_dashboard.php");
        exit();
    }

    // To insert username and pass via php code
    // $username = "admin";
    // $password = "admin123";
    // $hash = password_hash($password, PASSWORD_DEFAULT);
?>

<!DOCTYPE html>
<html>
    <body class="d-flex align-items-center justify-content-center" style="background: #377557;">
        <div class="container w-75">
            <div class="box px-5 py-5 text-center">

                <!-- Header -->
                <img src="../assets/img/logo.png" class="img-fluid mb-4" alt="" height="120px" width="120px">
                <h1 class="font-weight-bold">My Playland Kindersphere</h1>
                <h6 class="mb-5">Welcome to the My Playland Inc's <strong>Adminsphere</strong>. This site is strictly for administrative privileges.</h6>
                
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

                    <!-- Show error -->
                    <?php if(isset($_GET['error'])) { ?>
                            <p class="col-lg-7 mx-auto p-2" style="background-color: #F2DEDE; color: #A94442"> <?php echo $_GET['error']; ?> </p>
                    <?php } ?>
                    
                    <!-- Username -->
                    <div class="form-row">
                        <div class="col-lg-7 mx-auto">
                            <input type="username" placeholder="Username" name="username" class="form-control my-3 p-2">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-row">
                        <div class="col-lg-7 mx-auto">
                            <input type="password" placeholder="*********" name="password" class="form-control my-3 p-2">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-row">
                        <div class="col-lg-7 mx-auto">
                            <button type="submit" name="admin_login"
                                class="btn1 mt-4 mb-3">Login</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>

<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $PTpassword = mysqli_real_escape_string($connection, $_POST['password']);

        // Username textbox is empty
        if(empty($username)){
            header("Location: admin_login.php?error=Username is required");
            exit();
        } 
        
        // Password textbox is empty
        elseif(empty($PTpassword)){
            header("Location: admin_login.php?error=Password is required");
            exit();
        } 
        
        // textbox is filled
        else {
            $query = "SELECT password FROM admin_login WHERE username = '$username'";
            $result = mysqli_query($connection, $query);

            if(mysqli_num_rows($result) > 0){   
                $row = mysqli_fetch_assoc($result);
                $CTpassword = $row['password'];
                $_SESSION['username'] = $username;

                // Check if entered plaintext password is same with ciphertext
                if(password_verify($PTpassword, $CTpassword)){
                    $_SESSION['admin_login'] = true;
                    header("Location: admin_dashboard.php");
                } else{
                    header("Location: admin_login.php?error=Incorrect Password");
                    exit();
                }

            }else{
                header("Location: admin_login.php?error=Account not found");
                exit();
            }
        }
    }

    mysqli_close($connection);

    include __DIR__ . '../../base/end.php';
?>