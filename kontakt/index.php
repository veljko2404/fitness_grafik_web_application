<?php

  include '../core.php';

?>
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

    <link rel="stylesheet" href="../css/prikazi.css">
    <meta charset="utf-8">
    <title>Kontakt - Fitness Grafik</title>
    <meta name="description" content="Kontakt" />
    <meta name="keywords" content="kontakt" />
    <link rel="icon" sizes="50x50" href="../photos/logo.png">
    <link rel="apple-touch-icon" href="../photos/logo.png">
    <meta name="apple-mobile-web-app-title" content="../photos/logo.png">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="initial-scale=1.0">
  </head>
  <body>

      <div class="container-fluid div1">

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgba(255,255,255,0.075);width:100%;">
          <div class="container">
            <a class="navbar-brand me-2" href="#">
              <img src="../photos/logo.png" height="40" alt="logo" style="margin-top: -1px;" />
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
                <img class="profile_img" src="../photos/profile.png" height="40" alt="logo" style="margin-top: -1px;background-color:white;border-radius:50%;" />
              </a>

              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                <?php if(isset($_SESSION['user_id'])){ ?>
                <li><a class="dropdown-item" href="../index.php">Vrati se nazad</a></li>
                <li><a class="dropdown-item" href="../profile_settings.php">Podešavanje profila</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="../logout.php">Izloguj se</a></li>
              <?php } else { ?>
                <li><a class="dropdown-item" href="../index.php">Vrati se nazad</a></li>
                <li><a class="dropdown-item" href="../index.php">Napravi nalog</a></li>
              <?php } ?>
              </ul>
            </div>
          </div>
        </nav>

<form class="container" style="width:95%;max-width:500px; background-color:white;padding:20px;border-radius:5px;color:black;margin-top:50px">

  <div class="form-outline mb-4">
    <input type="text" id="ime" class="form-control" />
    <label class="form-label" for="ime">Ime</label>
  </div>

  <div class="form-outline mb-4">
    <input type="email" id="email" class="form-control" />
    <label class="form-label" for="email">Email adresa</label>
  </div>

  <div class="form-outline mb-4">
    <textarea class="form-control" id="poruka" rows="4" maxlength="200"></textarea>
    <label class="form-label" for="poruka">Poruka</label>
  </div>

  <a onclick="posalji()" id="btn" class="btn btn-primary btn-block mb-4">Pošalji</a>
  <div class="d-flex justify-content-center mb-4">
    <p id="status"></p>
  </div>
</form>
<script type="text/javascript">
function posalji() {
  var res = document.getElementById('btn');
  res.innerHTML = "Učitavanje...";
  var http = new XMLHttpRequest();
  var ime = document.getElementById('ime').value;
  var email = document.getElementById('email').value;
  var poruka = document.getElementById('poruka').value;
  var data = 'ime=' + ime + "&email=" + email + "&poruka=" + poruka;
  var url = "kontakt.php";
  var status = document.getElementById('status');
  http.open('POST', url, true);

  http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
        if(http.responseText=="ok"){
          status.innerHTML = "Poruka je uspesno poslata";
          status.style.color = "#00b74a";
          res.innerHTML = "Poslato";
          res.style.pointerEvents = "none";
          res.style.backgroundColor = "#00b74a";
        } else {
          status.innerHTML = http.responseText;
          status.style.color = "#f93154";
          res.innerHTML = "Probaj ponovo";
        }
    }
  }
  http.send(data);
}
</script>
      <div style="margin:auto;width:250px;">
        <a href="../index.php" class="btn btn-primary nazad">Vrati se nazad</a>
      </div>
    </div>
    <?php include '../footer2.php'; ?>
</html>
