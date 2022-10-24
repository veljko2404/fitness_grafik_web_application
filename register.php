<?php

require 'connect.php';
require 'core.php';

$ime = input($_POST['ime']);
$username = input($_POST['username']);
$email = input($_POST['email']);
$pass = md5($_POST['pass']);
$passr = md5($_POST['passr']);
$date = date("Y-m-d");
$rand = rand();
$rand = md5($rand);
$link = "https://fitnessgrafik.com/verify.php?code=".$rand."&username=".$username;

if(!loggedin()){
  if(isset($ime)&&isset($username)&&isset($email)&&isset($pass)&&isset($passr)){
    if(!empty($ime)&&!empty($username)&&!empty($email)&&!empty($pass)&&!empty($passr)){
      if($pass==$passr){
        if(strlen($_POST['pass'])>7){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $query_username = "SELECT `username` FROM `users` WHERE `username`='".$username."'";
          $query_run_username = mysqli_query($conn, $query_username);
          if(mysqli_num_rows($query_run_username) == 0){
            $query_email = "SELECT `email` FROM `users` WHERE `email`='".$email."'";
            $query_run_email = mysqli_query($conn, $query_email);
            if(mysqli_num_rows($query_run_email) == 0){
              $query_reg = "INSERT into  `users` (`ime`, `username`, `email`, `pass`, `date`, `verify`, `ok`) VALUES('$ime','$username','$email','$pass','$date','$rand','0')";
              if(mysqli_query($conn, $query_reg)){
                mail($email, "Verifikujte vašu email adresu!", "Klinkite ovde da verifikujete vašu email adresu: ".$link, "from: no-reply@fitnessgrafik.com");
                $sql = "CREATE TABLE ".$username." (
                  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  excercise VARCHAR(30),
                  weight INT(6),
                  date DATE
                )";
                mysqli_query($conn, $sql);
                echo "ok";
              } else {
                echo "Desila se greška prilikom otvaranja naloga!";
              }
            } else {
              echo "Već je registrovan nalog sa ovim emailom!";
            }
          } else {
            echo "Ovo korisničko ime je zauzeto!";
          }
        } else {
          echo "Unesite ispravan email!";
        }
      } else {
        echo "Šifra mora imati najmanje 8 znakova!";
      }
      } else {
        echo "Šifre se moraju poklapati!";
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
