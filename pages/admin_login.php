<?php include('server.php');

    if(isset($_POST['login_admin'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query1 = mysqli_query($connection, "SELECT * FROM `admininfo` WHERE email = '$email' AND password = '$password'") or die('query failed');

        if(mysqli_num_rows($query1) > 0){
            header('location:admin_dashboard.php'); // PUT DASHBOARD PAGE HERE
        }else{
            $msg[] = 'Incorrect Administrative Details!';
        }
    }
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

  <body style="background: #377557;">
    <section class="Form my-5 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5 d-flex justify-content-center pb-5 pt-5">
            <img src="assets/logo.png" class="img-fluid" alt="" height="200px" width="300px">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold">My Playland Kindersphere</h1>
            <p class="mb-5">Welcome to the My Playland Inc's <strong>Adminsphere</strong>. This site is strictly for administrative priviledges.</p>
            <form method="post" action="">
                <div class="form-row">
                    <div class="col-lg-7">
                    <input type="workmail" placeholder="Work Email" name="email" class="form-control my-2 p-2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                    <input type="password" placeholder="*********" name="password" class="form-control my-2 p-2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                    <button type="submit" name="login_admin" class="btn1 mt-3 mb-5">Login</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
