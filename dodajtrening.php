<?php

require 'connect.php';
require 'core.php';

$input_data = $_POST;

if(loggedin()){
  $user = $_SESSION["user_id"];
  $date = date("Y-m-d");
  foreach($input_data as $name => $weight){
    $username = $user['username'];
    $query = "INSERT INTO `$username` (`excercise`,`weight`,`date`) VALUES ('$name','$weight','$date')";
    if(mysqli_query($conn, $query)){
      echo "";
    } else {
      echo "Došlo je do problema tokom slanja podataka";
    }
  }

} else {
  echo 'Došlo je do problema tokom slanja podataka';
}
 ?>
