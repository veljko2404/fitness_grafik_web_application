<?php

require "core.php";
require "connect.php";

$code = input($_GET["code"]);
$username = input($_GET["username"]);
$query = "SELECT * FROM `users` WHERE `username`='$username' AND `verify`='$code'";
$query_run = mysqli_query($conn, $query);
if(mysqli_num_rows($query_run)==1){
  $user = mysqli_fetch_assoc($query_run);
  $id = $user["id"];
  $query = "UPDATE `users` SET `ok` = '1' WHERE `users`.`id` = '$id'";
  if(mysqli_query($conn,$query)){
    echo'
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
        <link rel="icon" sizes="50x50" href="photos/logo.png">
        <link rel="apple-touch-icon" href="photos/logo.png">
        <meta name="apple-mobile-web-app-title" content="photos/logo.png">
        <meta name="viewport" content="width=device-width" />
        <meta name="viewport" content="initial-scale=1.0">
      </head>
      <body>
      <div class="container">
      <br>
    <div class="alert alert-success mb-0 alert-dismissible fade show" id="alertExample" role="alert" data-mdb-color="secondary">
      <i class="fas fa-check me-2"></i>
      <p class="text-center">Nalog je uspešno verifikovan! <a href="index.php" class="alert-link me-1">Klikni ovde </a>da se prijaviš.</p>
    </div>
    </div>
    </body>
    </html>
    ';

  } else {
    echo "Došlo je do greške";
  }
} else {
  echo "Pogrešan kod ili korisničko ime";
}
?>
