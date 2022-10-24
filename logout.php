<?php

setcookie('username', 'daw', time() - (86400 * 30), "/");
setcookie('pass', 'dga', time() - (86400 * 30), "/");
require "core.php";
session_destroy();
header("Location: index.php");

 ?>
