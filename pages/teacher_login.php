<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "Teacher Login";
    include_once "head.php"; 
    include 'server.php' ;
?>


<?php
    if (isset($msg)) {
      $alertMessages = '';
      foreach ($msg as $msg) {
          $alertMessages .= $msg . '\n';
      }
      echo '<script>alert("' . $alertMessages . '");</script>';
      echo '<style>.alert { background-color: #377557; color: #fff; padding: 10px; }</style>';
    }
  ?>

  <head>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->

  </head>

<body style="background: #377557;">
    <section class="Form my-5 mx-5">
        <div class="container mx-auto">
            <div class="box px-5 pt-5 pb-2 text-center">
                <img src="../assets/img/logo.png" class="img-fluid" alt="" height="75px" width="75px">
                <h1 class="font-weight-bold">My Playland Kindersphere</h1>
                <p class="mb-5">Welcome to the My Playland Inc's <strong>Teachersphere</strong>. Input necessary details
                    below.</p>
                <form method="post" action="./auth.php" >
                    <div class="form-row">
                        <div class="col-lg-7 mx-auto">
                            <input type="email" placeholder="Email Address" name="email"
                                class="form-control my-2 p-2 d-block w-100">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7 mx-auto">
                            <input type="password" placeholder="*********" name="password"
                                class="form-control my-2 p-2 d-block w-100">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7 mx-auto">
                            <button type="submit" name="teacher_login"
                                class="btn1 mt-3 mb-5 d-block w-100">Login</button>
                        </div>
                        
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>