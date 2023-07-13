<?php
session_start();

if (isset($_SESSION["admin_login"])) //check condition admin login if not direct back to index.php page
{
    header("location: admin/dashboard.php");
}
if (isset($_SESSION["teacher_login"])) //check condition teacher login if not direct back to index.php page
{
    header("location: teacher/dashboard.php");
}
if (isset($_SESSION["student_login"])) //check condition student login if not direct back to index.php page
{
    header("location: student/dashboard.php");
}

include 'base/start.php';
include 'backend/auth.php';
?>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to KinderSphere</h1>
                                    </div>

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                               
                                        <hr>
                                        <a href="./student/" name="student_login"
                                            class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login as Student
                                        </a>
                                        <a href="./teacher/" type="submit" name="teacher_login"
                                            class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login as Teacher
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php
    include 'base/end.php';
    ?>