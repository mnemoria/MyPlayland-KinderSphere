<?php 
    include __DIR__ . '../../base/start.php';

	include('../backend/server.php');

    if(isset($_SESSION['admin_login'])) {
        header("Location: dashboard/index.php");
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
        <div class="rounded container w-50" style="background-color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <div class="box py-5 text-center">

                <!-- Header -->
                <img src="../assets/img/logo.png" class="img-fluid mb-4" alt="" height="120px" width="120px">
                <h1 class="font-weight-bold">My Playland Kindersphere</h1>
                <h6 class="mb-5 px-5">Welcome to the My Playland Inc's <strong>Adminsphere</strong>. This site is strictly for administrative privileges.</h6>
                
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

                    <!-- Show error -->
                    <?php if(isset($_GET['error'])) { ?>
                            <p class="col-lg-9 mx-auto p-2" style="background-color: #F2DEDE; color: #A94442"> <?php echo $_GET['error']; ?> </p>
                    <?php } ?>
                    
                    <!-- Username -->
                    <div class="form-row">
                        <div class="col-lg-9 mx-auto">
                            <input type="username" placeholder="Username" name="username" class="form-control p-2">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-row">
                        <div class="col-lg-9 mx-auto">
                            <input type="password" placeholder="*********" name="password" class="form-control my-3 p-2">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-row">
                        <div class="col-lg-9 mx-auto">
                            <button type="submit" name="admin_login" class="btn btn-primary btn-block mt-4" style="background-color:#377557">Login</button>
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
            header("Location: index.php?error=Username is required");
            exit();
        } 
        
        // Password textbox is empty
        elseif(empty($PTpassword)){
            header("Location: index.php?error=Password is required");
            exit();
        } 
        
        // textbox is filled
        else {
            $query = "SELECT password FROM admin_login WHERE username = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){   
                // Fetch the password hash from the result
                $row = $result->fetch_assoc();
                $CTpassword = $row['password'];

                // Check if entered plaintext password is same with ciphertext
                if(password_verify($PTpassword, $CTpassword)){
                    $_SESSION['username'] = $username;
                    $_SESSION['admin_login'] = true;
                    header("Location: dashboard/index.php");
                    exit();
                } else{
                    header("Location: index.php?error=Incorrect Password");
                    exit();
                }

            }else{
                header("Location: index.php?error=Account not found");
                exit();
            }
        }
    }

    mysqli_close($connection);

?>