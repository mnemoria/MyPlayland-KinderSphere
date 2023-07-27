<?php

if (isset($_SESSION["student_login"])) //check condition student session if not direct back to login page
{
    echo $_SESSION['student_login'];
    header("location: /playland/student/home");
}


include __DIR__ . '../../base/start.php';
include __DIR__ . '../../backend/auth.php';
?>

<body class="bg-gradient-success d-flex align-items-center justify-content-center vh-100">

    <div class="container">

        <!-- Outer Row -->
        <div class="row d-flex align-items-center justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <img src="../assets/logo.png" alt="" height="350">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login as Student</h1>
                                    </div>

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                                    <input type="hidden" name="txt_role" value="student"> 
                                    <!-- <hr>
                                    <p>Email: student1@gmail.com</p>
                                    <p>Password: aaa</p>
                                    <hr> -->


                                    <?php if (!empty($errorMsg)): ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?php echo implode('<br>', $errorMsg); ?>
                                    </div>
                                    <?php endif; ?>
                                    
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="txt_email"
                                                name="txt_email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." <?php if(isset($email)){ echo 'value="' . $email . '"'; }?>>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="txt_password" name="txt_password" placeholder="Password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" name="btn_login" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php
    include __DIR__ . '../../base/end.php';
    ?>