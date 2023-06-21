<head>
        <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
Bootstrapsssssssss
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="Form my-5 mx-5">
      <div class="container mx-auto">
        <div class="box px-5 pt-5 pb-5 text-center">
          <img src="../assets/img/logo.png" class="img-fluid" alt="" height="75px" width="75px">
          <h3 class="font-weight-bold py-3 mb-5">Login as</h3>
          <form action="">
            <div class="form-row">
              <div class="col-lg-5 mx-auto">
                <button type="button" class="btn1 mb-3 d-block w-100" onclick="redirectToLogin('user')">Student</button>
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-5 mx-auto">
                <button type="button" class="btn1 mb-5 d-block w-100" onclick="redirectToLogin('teacher')">Teacher</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>    
</body>
