<?php

require 'connect.php';
require 'core.php';
if(loggedin()){
  $id = input($_POST['id']);
  $username = $_SESSION['user_id']['username'];
  $query = "DELETE FROM $username WHERE `$username`.`id` = $id";
  if(mysqli_query($conn, $query)){
    echo 'ok';
  } else {
    "Došlo je do problema";
  }

} else {
  header("Location: index.php");
}

 ?>
