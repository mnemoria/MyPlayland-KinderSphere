<?php 
    include('server.php');
    include('head.php');

    if(isset($_POST['login_user'])){
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query1 = mysqli_query($connection, "SELECT * FROM `studinfo` WHERE email = '$email' AND password = '$password'") or die('query failed');

        if(mysqli_num_rows($query1) > 0){
            header('location:landingpage.php'); // PUT DASHBOARD PAGE HERE
        }else{
            $msg[] = 'Incorrect login details!';
        }
    }
?>

    <?php
        // if (isset($msg)) {
        //     $alertMessages = '';
        //     foreach ($msg as $msg) {
        //         $alertMessages .= $msg . '\n';
        //     }
        //     echo '<script>alert("' . $alertMessages . '");</script>';
        //     echo '<style>.alert { background-color: #377557; color: #fff; padding: 10px; }</style>';
        // }
    ?>
    <head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="../assets/img/logo.png" type="image/x-icon"/>
<title><?php if(isset($_SESSION['title'])) echo $title . ' |'; ?> KinderSphere</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="..\styles\sidebar.css">
<link rel="stylesheet" href="..\styles\styles.css">
<link rel="stylesheet" href="table.css">
<link rel="stylesheet" href="view.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="../scripts/script.js"></script>

</head>

    <body style="background: #377557;">
        <section class="Form my-5 mx-5">
            <div class="container mx-auto">
                <div class="box px-5 pt-5 pb-2 text-center">
                    <img src="assets/logo.png" class="img-fluid pb-3" alt="" height="75px" width="75px">
                    <h1 class="font-weight-bold">My Playland Kindersphere</h1>
                    <p class="mb-5">Welcome to the My Playland Inc's <strong>Student Information System</strong>. Access your child's personal account to stay updated on their educational journey.</p>
                    <form method="post" action="">
                        <div class="form-row">
                            <div class="col-lg-7 mx-auto">
                            <input type="email" placeholder="Email Address" name="email" class="form-control my-2 p-2 d-block w-100">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7 mx-auto">
                            <input type="password" placeholder="*********" name="password" class="form-control my-2 p-2 d-block w-100">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7 mx-auto">
                            <button type="submit" name="login_user" class="btn1 mt-3 mb-5 d-block w-100">Login</button>
                            </div>
                        </div>
                        <?php
        if (isset($msg)) {
            $alertMessages = '';
            foreach ($msg as $msg) {
                $alertMessages .= $msg . '\n';
            }
            echo '<h1>' . $msg . '</h1>';
        }
    ?>
                    </form>
                </div>
            </div>
        </section>    

    </body>
