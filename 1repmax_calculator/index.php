<?php include '../core.php'; ?>
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
    <title>One Rep Max Kalkulator - Izračunajte One Rep Max za bilo koju vežbu.</title>
    <meta name="description" content="One Rep Max je maksimalna težina sa kojom možete uraditi najviše jedan ponavljaj." />
    <meta name="keywords" content="One Rep Max Kalkulator,One Rep Max Calkulator" />
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
        <div class="container">
          <h1 class="text-center" style="margin:40px 5px;">Izračunajte One Rep Max za bilo koju vežbu.</h1>
          <h2 class="text-center" style="margin:40px 5px;">One Rep Max je maksimalna težina sa kojom možete uraditi najviše jedan ponavljaj.</h2>
        </div>
        <div class="container" style="width:95%;max-width:800px;background-color:white;margin:20px auto;padding:30px;border-radius:5px;color:#4f4f4f">
          <label for="reps" class="form-label">
            Unesite broj ponavljaja: <span id="reps_num" class="text-primary">2</span>
          </label>
          <input value="1" type="range" oninput="vrednost()" class="form-range" min="2" max="15" step="1" id="reps">
          <label for="weight" class="form-label">
            Unesite težinu: <span id="weight_num" class="text-primary">2.5 kg</span>
          </label>
          <input value="2.5" type="range" oninput="vrednost_w()" class="form-range" min="2.5" max="200" step="2.5" id="weight">
          <button onclick="izr()" class="btn btn-success" id="izr" style="margin:20px auto;transform: translateX(-50%);left: 50%;position: relative;">Izračunaj</button>
          <h3 class="text-danger text-center" style="display:none;" id="prikaz"></h3>
        </div>
        <script type="text/javascript">
        function vrednost(){
          var reps = document.getElementById("reps");
          document.getElementById("reps_num").innerHTML = reps.value;
        }
        function vrednost_w(){
          var w = document.getElementById("weight");
          document.getElementById("weight_num").innerHTML = w.value + " kg";
        }
        function izr(){
          var p = document.getElementById("reps").value;
          var t = document.getElementById("weight").value;
          var rez = t * (1+0.025 * p);
          rez = Math.round(rez * 10) / 10;
          var prikaz = document.getElementById("prikaz");
          prikaz.innerHTML = "1 Rep Max ≈	" + "<strong>" + rez + "</strong>" + " kg";
          prikaz.style.display = "block";
        }
        </script>
      <div style="margin:auto;width:250px;">
        <a href="../index.php" class="btn btn-primary nazad">Vrati se nazad</a>
      </div>
    </div>
    <?php include '../footer2.php'; ?>
</html>
