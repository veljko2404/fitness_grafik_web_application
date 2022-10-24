<?php

require 'connect.php';
require 'core.php';
if(loggedin()){
  if(!empty($_POST['username'])){
    $username = input($_POST['username']);
    $c_username = $_SESSION['user_id']['username'];
    $query_check = "SELECT `username` FROM `users` WHERE `username`='$username'";
    $query_run_check = mysqli_query($conn, $query_check);
    if(mysqli_num_rows($query_run_check)==1){
      echo "Ovo korisničko ime je zauzeto";
    } else {
      $query_username = "UPDATE `users` SET `username`='$username' WHERE `users`.`username`='$c_username'";
      if(mysqli_query($conn, $query_username)){
        $_SESSION['user_id']['username'] = $username;
        $table_name = "RENAME TABLE `$c_username` TO `$username`";
        mysqli_query($conn, $table_name);
        echo 'ok';
      } else {
        echo "Došlo je do problema";
      }
    }


  } else if(!empty($_POST['new_password'])&&!empty($_POST['prev_password'])){
    $prev_password = md5($_POST['prev_password']);
    $new_password = md5($_POST['new_password']);
    if(strlen($_POST['new_password'])>7){
      if($_SESSION['user_id']['pass']==$prev_password){
      $u = $_SESSION['user_id']['username'];
        $query_pass = "UPDATE `users` SET `pass`='$new_password' WHERE `users`.`username`='$u'";
        if(mysqli_query($conn,$query_pass)){
          $_SESSION['user_id']['pass'] = $new_password;
          echo 'ok';
        } else {
          echo 'Došlo je do problema';
        }
      } else {
        echo 'Stara šifra nije tačna';
      }
    } else {
      echo "Šifra mora imati više od 8 znakova";
    }

  } else {
    echo "Ne sme biti prazno!";
  }
} else {
  header("Location: index.php");
}

 ?>
