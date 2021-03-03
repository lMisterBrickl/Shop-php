<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
include ("navbar.php");
?>

  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="login-box">
      <div class="row">
      <div class="col-md-6">
          <h3>Logare</h3>
          <form  action="validare.php" method="post">
            <div class="form-group">
              <label>Nume utilizator</label> <br>
              <input type="text" name="User" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Parola</label> <br>
              <input type="password" name="Parola" class="form-control" required>
              <?php
                if (isset($_SESSION['error']) & !empty($_SESSION['error'])){
                  echo "<p class = 'alert alert-danger'>"
                  . $_SESSION['error'] . "</p>" ;
                } ?>
            </div>
            <button type="submit" class="btn btn-danger add mt-2"> Logare </button>


          </form>
        </div>
        <div class="col-md-6">
          <h3>Registrare</h3>
          <form  action="register.php" method="post">
            <div class="form-group">
              <label>Nume utilizator</label> <br>
              <input type="text" name="UserR" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Parola</label> <br>
              <input type="password" name="ParolaR" class="form-control" required>
              <?php
                if (isset($_SESSION['errorR']) & !empty($_SESSION['errorR'])){
                  $_SESSION['success'] = "";
                  echo "<p class = 'alert alert-danger'>"
                  . $_SESSION['errorR'] . "</p>" ;
                  $_SESSION['errorR'] = "";

                }else{
                  if(isset($_SESSION['success']) & !empty($_SESSION['success'])) {
                          echo "<p class = 'alert alert-success'>"
                        . $_SESSION['success'] . "</p>" ;
                      }
                }?>

            </div>
            <button type="submit" class="btn btn-danger add mt-2"> Registrare </button>
          </form>
        </div>
      </div>
  </div>
</div>
  </body>
</html>
