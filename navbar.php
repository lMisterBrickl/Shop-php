<!DOCTYPE html>
<?php
  include ('conectare.php');
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
      if(!isset($_SESSION['user'])){?>
        <div class="bs-example">
          <nav class="navbar  navbar-light navbar-fixed-top" id="navbar">
            <a href="/PHP3/shop/index.php" class="navbar-brand" >Marius Shop</a>
            <a href="/PHP3/shop/login.php" class="navbar-brand" >Logare</a>
          </nav>
        </div>
      <?php } else { ?>
        <div class="bs-example">
          <nav class="navbar  navbar-light navbar-fixed-top" id="navbar">
            <a href="/PHP3/shop/index.php" class="navbar-brand" >Marius Shop</a>
            <a href="/PHP3/shop/logout.php" class="navbar-brand" > Delogare</a>
          </nav>
        </div>
      <?php } ?>
    </body>
</html>
