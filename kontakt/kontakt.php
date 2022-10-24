<?php

require "../connect.php";
require "../core.php";


  $ime = input($_POST['ime']);
  $email = input($_POST['email']);
  $poruka = input($_POST['poruka']);

  if(isset($email)&&isset($ime)&&isset($poruka)){
    if(!empty($email)&&!empty($ime)&&!empty($poruka)){
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "INSERT INTO `kontakt` (`ime`, `email`, `poruka`) VALUES ('$ime', '$email', '$poruka')";
        if(mysqli_query($conn, $query)){
          mail('veljko.petko00022@gmail.com','Kontakt','$poruka','from:kontakt@fitnessgrafik.com');
          echo "ok";
        } else {
          echo 'Došlo je do greške!';
        }
      } else {
        echo 'Unesite ispravan email';
    }
    } else {
      echo "Sva polja moraju biti popunjena!";
    }
  } else {
    echo "Sva polja moraju biti popunjena!";
  }


 ?>
