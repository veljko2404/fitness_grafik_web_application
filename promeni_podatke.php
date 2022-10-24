<?php

require 'connect.php';
require 'core.php';
if(loggedin()){
  $exc = $_GET['exc'];
  if(isset($_GET['sve'])){
    $sve = true;
    $num_rows = 0;
  } else {
    $sve = false;
  }


?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
      <!-- MDB -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
      <!-- MDB -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
      <!--JQUERY-->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">

      <link rel="stylesheet" href="css/prikazi.css">
      <meta charset="utf-8">
      <title>Promeni podatke vežbe - Fitness Grafik</title>
      <link rel="icon" sizes="50x50" href="photos/logo.png">
      <link rel="apple-touch-icon" href="photos/logo.png">
      <meta name="apple-mobile-web-app-title" content="photos/logo.png">
      <meta name="viewport" content="width=device-width" />
      <meta name="viewport" content="initial-scale=1.0">
    </head>
    <body>

        <div class="container-fluid div1">

          <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgba(255,255,255,0.075);width:100%;">
            <div class="container"
              <a class="navbar-brand me-2" href="#">
                <img src="photos/logo.png" height="40" alt="logo" style="margin-top: -1px;" />
              </a>

              <div class="dropstart">
                <a
                  class="navbar-brand me-2 dropdown-toggle"
                  href="#"
                  role="button"
                  id="dropdownMenuLink"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false"
                  >
                  <img class="profile_img" src="photos/profile.png" height="40" alt="logo" style="margin-top: -1px;background-color:white;border-radius:50%;" />
                </a>

                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="1repmax_calculator">1 Rep Max Kalkulator</a></li>
                  <li><a class="dropdown-item" href="profile_settings.php">Podešavanje profila</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="logout.php">Izloguj se</a></li>
                </ul>
              </div>
            </div>
          </nav>

        <div class="promeni container">
          <h1 class="text-center" id="naslov"></h1>
          <script type="text/javascript">
            let ex = "<?php echo $exc; ?>".replaceAll("_", " ");
            document.getElementById("naslov").innerHTML = ex;
          </script>
          <?php
            $username = $_SESSION['user_id']['username'];
            if($sve){
              $query = "SELECT `id`,`weight`,`date` FROM `$username` WHERE `excercise`='$exc' ORDER BY id DESC";
            } else {
              $query = "SELECT `id`,`weight`,`date` FROM `$username` WHERE `excercise`='$exc' ORDER BY id DESC LIMIT 10";
              $query_num = "SELECT `id` FROM `$username` WHERE `excercise`='$exc' ORDER BY id DESC";
              $query_run_num = mysqli_query($conn, $query_num);
              $num_rows = mysqli_num_rows($query_run_num);
            }
            $query_run = mysqli_query($conn, $query);

            while($data = mysqli_fetch_assoc($query_run)){
           ?>
          <div id="podatak<?php echo $data['id']; ?>" class="podatak container-fluid hover-shadow">
            <p style="float:left;padding:6.25px;margin:0;"><?php $vreme = date_create($data['date']); $vreme = date_format($vreme, "d/m/Y"); echo $vreme." - ".$data['weight']; ?> kg</p>
            <button class="btn btn-secondary" onclick="obrisi(<?php echo $data['id']; ?>)" style="float:right;">Obriši</button>
          </div>
        <?php } ?>
        <script type="text/javascript">
        function obrisi(id) {
          var http = new XMLHttpRequest();
          var data = "id=" + id;
          var url = "obrisi_podatak.php";
          var btn = "podatak" + id;
          http.open('POST', url, true);

          http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
              if(http.responseText=="ok"){
                document.getElementById(btn).style.display = "none";
              } else {
                alert(http.responseText);
              }
            }
          }
          http.send(data);
        }
        </script>
          <div style="margin:auto;width:250px;">
            <?php if($num_rows>10 && !$sve){ ?>
              <a href="promeni_podatke.php?exc=<?php echo $exc; ?>&sve=true" class="btn btn-success nazad" style="margin-bottom:0;">Učitaj sve podatke (<?php echo $num_rows-10; ?>)</a>
            <?php } ?>
            <a href="index.php" class="btn btn-primary nazad">Vrati se nazad</a>
          </div>
        </div>
      </div>
      <?php include 'footer.php'; ?>
  </html>
<?php
} else {
  header("Location: index.php");
}

 ?>
