<?php

require 'connect.php';
require 'core.php';
if(loggedin()){
  require 'account.php';
} else {
  require 'main.php';
}

 ?>
