<?php

require 'connect.php';
require 'core.php';

$email = input($_POST['email']);
$pass = input($_POST['pass']);
$zapamti = input($_POST['zapamti']);
$pass = md5($pass);

if(!loggedin()){
  if(isset($email)&&isset($pass)){
    if(!empty($email)&&!empty($pass)&&!empty($zapamti)){
      $query_email = "SELECT * FROM `users` WHERE `email`='$email' AND `pass`='$pass'";
      $query_run_email = mysqli_query($conn, $query_email);
      $query_username = "SELECT * FROM `users` WHERE `username`='$email' AND `pass`='$pass'";
      $query_run_username = mysqli_query($conn, $query_username);
      if(mysqli_num_rows($query_run_username) == 1){
        $user_id = mysqli_fetch_assoc($query_run_username);
        if($user_id["ok"]==1){
          $_SESSION['user_id'] = $user_id;
          if($zapamti == "true"){
            setcookie('username', $user_id['username'], time() + (86400 * 30), "/");
            setcookie('pass', $user_id['pass'], time() + (86400 * 30), "/");
          }
          echo 'ok';
        } else {
          echo 'Email adresa nije verifikovana!';
        }
      } else if(mysqli_num_rows($query_run_email) == 1){
        $user_id = mysqli_fetch_assoc($query_run_email);
        if($user_id["ok"]==1){
          $_SESSION['user_id'] = $user_id;
          if($zapamti == "true"){
            setcookie('user_username', $user_id['username'], time() + (86400 * 30), "/");
            setcookie('user_id', $user_id['pass'], time() + (86400 * 30), "/");
          }
          echo 'ok';
        } else {
          echo 'Email adresa nije verifikovana!';
        }
      } else {
        echo "Neispravan email/korisničko ime ili šifra";
      }
    } else {
      echo "Sva polja moraju biti popunjena!";
    }
  } else {
    echo "Sva polja moraju biti popunjena!";
  }
} else {
  header("Location: index.php");
}

 ?>
