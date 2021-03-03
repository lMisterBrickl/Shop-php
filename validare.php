<?php
  include ('conectare.php');
  $name = $_POST['User'];
  $pass = $_POST['Parola'];

  $s = "select * from client where user = '$name' && parola = '$pass'";

  $result = mysqli_query($conn, $s);
  $num = mysqli_num_rows($result);
  if($num > 0){
    $_SESSION['user'] = $name;
    header('location:index.php');
  }else {
    $eror = "Numele de utilizator sau parola sunt incorecte";
    header('location:login.php');
    $_SESSION['error'] = $eror;
  }
 ?>
