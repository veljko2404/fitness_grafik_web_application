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
    <title>Uslovi korišćenja - Fitness Grafik</title>
    <meta name="description" content="Uslovi korišćenja" />
    <meta name="keywords" content="Uslovi korišćenja" />
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

        <div class="container" style="width:95%;background-color:#fff;padding:20px;margin:50px auto 20px;color:rgba(0,0,0,0.8);border-radius:5px;">

          <h1 class="text-center">Uslovi korišćenja</h1><br>
          <h2>Kolačići</h2>
          <p>Kolačići su male tekstualne datoteke koje se čuvaju u vašem računaru, tabletu ili mobilnom uređaju. <a href="https://fitnessgrafik.com/">Fitness Grafik</a> koristi kolačiće kada čekirate dugme "ZAPAMTI ME" prilikom prijavljivanja na vaš nalog.</p>
          <h2>Linkovi sa internet sajtova trećih lica</h2>
          <p><a href="https://fitnessgrafik.com/">Fitness Grafik</a> može sadržati linkove drugih internet sajtova čiji vlasnik nije <a href="https://fitnessgrafik.com/">Fitness Grafik</a>. Takvi linkovi su obezbeđeni isključivo da bi Vama pružili što više informacija. <a href="https://fitnessgrafik.com/">Fitness Grafik</a> ne kontroliše i nije odgovoran za rad, sadržaj, politiku privatnosti ili bezbednost ovih sajtova.</p>
          <h2>Autorska prava</h2>
          <p><a href="https://fitnessgrafik.com/">Fitness Grafik</a> polaže autorska prava na sve sopstvene sadržaje (tekstualne i vizuelne materijale, baze podataka i programerski kod).</p>
          <h2>Maloletni Korisnici</h2>
          <p>Ukoliko ste maloletni, neophodno je da dobijete dozvolu svojih roditelja ili staratelja pre nego što nam date informacije o sebi. Maloletnim korisnicima koji nemaju odobrenje nije dozvoljeno davanje ličnih informacija.</p>
          <h2>Izmena uslova korišćenja</h2>
          <p>Korišćenjem portala korisnik prihvata ove uslove korišćenja i sve njegove izmene i dopune. Smatra se da su korisnici korišćenjem <a href="https://fitnessgrafik.com/">Fitness Grafik</a>, u svakom trenutku upoznati sa aktuelnim pravilima korišćenja i da su ih razumeli.</p>
          <h2>Zaštita privatnosti</h2>
          <p>Prikupljanje, obrada i čuvanje ličnih podataka od strane <a href="https://fitnessgrafik.com/">Fitness Grafik</a> se obavlja u skladu sa <a href="../politika_privatnosti">politikom privatnosti</a> koja je dostupna na uvid svim korisnicima. Prihvatanjem ovih pravila i uslova korišćenja <a href="https://fitnessgrafik.com/">Fitness Grafik</a>, svaki korisnik usluga potvrđuje da je upoznat i saglasan sa <a href="../politika_privatnosti">politikom privatnosti</a>.</p>
        </div>


      <div style="margin:auto;width:250px;">
        <a href="../index.php" class="btn btn-primary nazad">Vrati se nazad</a>
      </div>
    </div>
    <?php include '../footer2.php'; ?>
</html>
