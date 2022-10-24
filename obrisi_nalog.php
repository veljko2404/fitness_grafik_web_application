<?php

require 'connect.php';
require 'core.php';
if(loggedin()){
  $username = $_SESSION['user_id']['username'];
  $email = $_SESSION['user_id']['email'];
  $query = "DELETE FROM `users` WHERE `users`.`username`='$username' AND `users`.`email`='$email'";
  if(mysqli_query($conn, $query)){
    $query_table = "DROP TABLE `$username`";
    if(mysqli_query($conn,$query_table)){
      session_destroy();
      echo "ok";
    } else {
      echo "Doslo je do greške";
    }
  } else {
    "Doslo je do greške";
  }

} else {
  header("Location: index.php");
}

 ?>
