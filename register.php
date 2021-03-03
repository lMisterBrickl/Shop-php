<?php
  header('location:login.php');
  include ("conectare.php");

  $name = $_POST['UserR'];
  $pass = $_POST['ParolaR'];

  $s = "select * from client where user = '$name'";

  $result = mysqli_query($conn, $s);
  $num = mysqli_num_rows($result);
  if($num == 1){
    $erorR = " Numele de utilizator a fost luat deja";
    header('location:login.php');
    $_SESSION['errorR'] = $erorR;
  }
  if($num == 0) {
    $succes = "Succes";
    $reg = "insert into client(user , parola) values ('$name','$pass')";
    mysqli_query($conn, $reg);
    $_SESSION['success'] = $succes ;
    header('location:login.php');
  }
 ?>
