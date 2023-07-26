<?php

if (isset($_SESSION["teacher_login"])) //check condition teacher session if not direct back to login page
{
    echo $_SESSION['teacher_login'];
    header("location: /playland/teacher/home");
}


include __DIR__ . '../../base/start.php';
include __DIR__ . '../../backend/auth.php';
?>

<body class="bg-gradient-success d-flex align-items-center justify-content-center">
    <div class="rounded container w-50" style="background-color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <div class="box     py-5 text-center">

            <!-- Header -->
            <img src="../assets/logo.png" class="img-fluid mb-4" alt="" height="120px" width="120px">
            <h1 class="font-weight-bold">My Playland Kindersphere</h1>
            <h6 class="mb-5 px-5">Welcome to the My Playland Inc's <strong>Teachersphere</strong>.</h6>
            
            <!-- Form -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="px-5">
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
</body>

    <?php
    include __DIR__ . '../../base/end.php';
    ?>