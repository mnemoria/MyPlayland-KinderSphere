<?php

if (isset($_SESSION["teacher_login"])) //check condition teacher session if not direct back to login page
{
    echo $_SESSION['teacher_login'];
    header("location: /playland/teacher/home");
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
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row p-5">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <img src="../assets/logo.png" alt="" height="350">
                            </div>
                            
                            <div class="col-lg-6 p-5">
                                <div class="text-center mb-4">
                                    <h6>Welcome to the My Playland Inc's</h6>
                                    <h1 class="font-weight-bold">Teachersphere</h1>
                                </div>

                                <div>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                                    <input type="hidden" name="txt_role" value="teacher"> 

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
                                        <button type="submit" name="btn_login" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
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