<?php

$currentfile = $_SERVER['SCRIPT_NAME'];
ob_start();
session_start();

function loggedin(){
  if(isset($_SESSION["user_id"])&&!empty($_SESSION["user_id"])){
    return true;
  } else {
    if(!empty($_COOKIE['username'])&&!empty($_COOKIE['pass'])){
      $db_host = "208.82.114.162";
      $db_user = "fitnessg_admin";
      $db_pass = "Fitness_Grafik";
      $db = "fitnessg_fitness";
      $conn = mysqli_connect($db_host, $db_user, $db_pass);
      mysqli_select_db($conn, $db);
      $pass = $_COOKIE['pass'];
      $username = $_COOKIE['username'];
      $query = "SELECT * FROM `users` WHERE `username`='$username' AND `pass`='$pass'";
      $query_run = mysqli_query($conn, $query);
      $data = mysqli_fetch_assoc($query_run);
      $_SESSION['user_id'] = $data;
      return true;
    } else {
      return false;
    }
    return false;
  }
}
function input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>
