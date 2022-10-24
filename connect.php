<?php

$db_host = "208.82.114.162";
$db_user = "fitnessg_admin";
$db_pass = "";
$db = "fitnessg_fitness";
$conn = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($conn, $db);

?>