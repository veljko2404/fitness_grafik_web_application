<?php

require "connect.php";
require "core.php";

if(!loggedin()){

  $email = input($_POST['email']);
  $code = input($_POST['code']);
  $pass = md5($_POST['pass']);

  if(isset($email)&&isset($pass)&&isset($code)){
    if(!empty($email)&&!empty($pass)&&!empty($code)){
      $query = "SELECT * FROM `users` WHERE `email`='$email' AND `verify`='$code'";
      $query_run = mysqli_query($conn, $query);
      if(mysqli_num_rows($query_run) == 1){
        $user_id = mysqli_fetch_assoc($query_run);
        $id = $user_id['id'];
        $query_reset = "UPDATE `users` SET `pass` = '$pass', `verify`='reset' WHERE `users`.`id` = '$id'";
        if(mysqli_query($conn, $query_reset)){
          echo "ok";
        } else {
          echo 'Došlo je do greške!';
        }
      } else {
        echo "Došlo je do greške!!";
      }
    } else {
      echo "Polje za email mora biti popunjeno!";
    }
  } else {
    echo "Polje za email mora biti popunjeno!";
  }

} else {
  header("Location: index.php");
}

 ?>
