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
    <title>Politika Privatnosti - Fitness Grafik</title>
    <meta name="description" content="Politika Privatnosti" />
    <meta name="keywords" content="Politika Privatnosti" />
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
                <li><a class="dropdown-item" href="../profile_settings.php">Pode??avanje profila</a></li>
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

        <div class="container" style="width:95%;background-color:#fff;padding:20px;margin:50px auto 20px;color:rgba(0,0,0,0.8);border-radius:5px;">

          <h1 class="text-center">Politika privatnosti</h1><br>
          <h2>Ko smo mi</h2>
          <p><a href="https://fitnessgrafik.com/">Fitness Grafik</a>, kontakt@gmail.com, obra??uje va??e podatke o li??nosti.</p>
          <h2>Vrste podataka o li??nosti koje prikupljamo</h2>
          <p><a href="https://fitnessgrafik.com/">Fitness Grafik</a> prikuplja slede??e podatke o li??nosti: Email adresa,Ime.</p>
          <h2>Svrha obrade i pravni osnov</h2>
          <p><a href="https://fitnessgrafik.com/">Fitness Grafik</a> koristi va??e podatke za slede??e svrhe: Kreiranje korisni??kih naloga.</p>
          <p><a href="https://fitnessgrafik.com/">Fitness Grafik</a> podatke o li??nosti obra??uje na osnovu slede??eg pravnog osnova:Pristanak. Pristanak mo??ete povu??i u svakom trenutku.</p>
          <h2>Period ??uvanja va??ih podataka</h2>
          <p>Podatke koje nam ostavljate prilikom registracije ??uvamo do brisanja va??eg korisni??kog naloga.</p>
          <h2>Korisnici podataka</h2>
          <p><a href="https://fitnessgrafik.com/">Fitness Grafik</a> ne prosle??uje, ne prodaje, ne iznajmljuje va??e podatke o li??nosti tre??im licima.</p>
          <h2>Transfer podataka o li??nosti van Srbije</h2>
          <p><a href="https://fitnessgrafik.com/">Fitness Grafik</a> ne vr??i transfer podataka o li??nosti van teritorije Republike Srbije.</p>
          <h2>Promene pravila</h2>
          <p>Kori????enjem <a href="https://fitnessgrafik.com/">Fitness Grafik</a> smatra se da ste upoznati sa najnovijim pravilima.</p>
        </div>


      <div style="margin:auto;width:250px;">
        <a href="../index.php" class="btn btn-primary nazad">Vrati se nazad</a>
      </div>
    </div>
    <?php include '../footer2.php'; ?>
</html>
