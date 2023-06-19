<?php include('server.php');

    session_start();

    if(isset($_POST['login_teacher'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query1 = mysqli_query($connection, "SELECT * FROM `teacherinfo` WHERE email = '$email' AND password = '$password'") or die('query failed');

        if(mysqli_num_rows($query1) > 0){
            header('location:landingpage.php'); // PUT DASHBOARD PAGE HERE
        }else{
            $msg[] = 'Incorrect login details!';
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Playland Student Information System</title>
    <link rel="icon" href="assets/logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>

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
      <div class="container mx-auto">
        <div class="box px-5 pt-5 pb-2 text-center">
          <img src="assets/logo.png" class="img-fluid" alt="" height="75px" width="75px">
          <h1 class="font-weight-bold">My Playland Kindersphere</h1>
          <p class="mb-5">Welcome to the My Playland Inc's <strong>Teachersphere</strong>. Input necessary details below.</p>
          <form method="post" action="">
            <div class="form-row">
                <div class="col-lg-7 mx-auto">
                <input type="email" placeholder="Work Email" name="email" class="form-control my-2 p-2 d-block w-100">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7 mx-auto">
                <input type="password" placeholder="*********" name="password" class="form-control my-2 p-2 d-block w-100">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-7 mx-auto">
                <button type="submit" name="login_teacher" class="btn1 mt-3 mb-5 d-block w-100">Login</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </section>    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>