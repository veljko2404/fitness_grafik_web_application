<?php

require "../connect.php";
require "../core.php";

$q = "SELECT * from `kontakt`";
$qr = mysqli_query($conn, $q);

 while ($data = mysqli_fetch_assoc($qr)){
    echo $data['ime'];
     
 }
    
?>