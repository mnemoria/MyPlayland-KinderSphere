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
  <body style="background: #377557;">
    <section class="Form my-5 mx-5">
      <div class="container mx-auto">
        <div class="box px-5 pt-5 pb-5 text-center">
          <img src="assets/logo.png" class="img-fluid" alt="" height="75px" width="75px">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>