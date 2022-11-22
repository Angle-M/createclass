<?php
  session_start();
  ?>
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <title>Member: Login</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <?php
          if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
          }
         ?>
        <hr />
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h1>Welcome back!</h1>
          <p class="lead">Please sign in to access members only pages</p>
            <form method="POST" action="AuthHelper.php">
              <h3>Sign in:</h3>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary" name="action" value="signin">Submit</button>
            </form>
            <hr />
          </div>

        <div class="col-lg-6">
          <h1>Join us!</h1>
          <p class="lead">Please sign up for members only perks</p>
          <div class="row">
              <form method="POST" action="AuthHelper.php">
                <h3>Sign up:</h3>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Your name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputName1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary" name="action" value="signup">Submit</button>
              </form>
              <hr />
            </div>
          </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </body>
</html>
