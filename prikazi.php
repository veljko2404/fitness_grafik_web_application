<?php

require 'connect.php';
require 'core.php';
if(loggedin()){
  $exc = $_GET['exc'];
  $vreme = $_GET['vreme'];
  $user = $_SESSION['user_id'];
  $username = $user['username'];
  if($vreme == "7dana"){
    $query = "SELECT * FROM `$username` WHERE `excercise`='$exc' AND date >= DATE(NOW()) - INTERVAL 7 DAY ORDER BY id DESC LIMIT 99999";
    $br_dana = " - za poslednjih 7 dana";
  } else if($vreme == "1mesec"){
    $query = "SELECT * FROM `$username` WHERE `excercise`='$exc' AND date >= DATE(NOW()) - INTERVAL 30 DAY ORDER BY id DESC LIMIT 99999";
    $br_dana = " - za poslednjih mesec dana";
  } else if($vreme == "2meseca"){
    $query = "SELECT * FROM `$username` WHERE `excercise`='$exc' AND date >= DATE(NOW()) - INTERVAL 60 DAY ORDER BY id DESC LIMIT 99999";
    $br_dana = " - za poslednjih 2 meseca";
  } else if($vreme == "3meseca"){
    $query = "SELECT * FROM `$username` WHERE `excercise`='$exc' AND date >= DATE(NOW()) - INTERVAL 90 DAY ORDER BY id DESC LIMIT 99999";
    $br_dana = " - za poslednjih 3 meseca";
  } else if($vreme == "6meseci"){
    $query = "SELECT * FROM `$username` WHERE `excercise`='$exc' AND date >= DATE(NOW()) - INTERVAL 180 DAY ORDER BY id DESC LIMIT 99999";
    $br_dana = " - za poslednjih 6 meseci";
  } else if($vreme == "1godina"){
    $query = "SELECT * FROM `$username` WHERE `excercise`='$exc' AND date >= DATE(NOW()) - INTERVAL 365 DAY ORDER BY id DESC LIMIT 99999";
    $br_dana = " - za poslednjih godinu dana";
  } else if($vreme == "oduvek"){
    $query = "SELECT * FROM `$username` WHERE `excercise`='$exc' ORDER BY id DESC LIMIT 99999";
    $br_dana = " - oduvek";
  } else if($vreme == "5unosa"){
    $query = "SELECT * FROM `$username` WHERE `excercise`='$exc' ORDER BY id DESC LIMIT 5";
    $br_dana = " - poslednjih 5 unosa";
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
      <!--GOOGLE CHARTS-->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <!--JQUERY-->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">

      <link rel="stylesheet" href="css/prikazi.css">
      <meta charset="utf-8">
      <title>Prikaži detaljnije <?php echo $br_dana; ?> - Fitness Grafik</title>
      <link rel="icon" sizes="50x50" href="photos/logo.png">
      <link rel="apple-touch-icon" href="photos/logo2.jpg">
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

        <div class="charts container">
          <h1 id="h1" class="text-center"></h1>
          <div style="margin:auto;width:190px;">

            <div class="dropdown">
  <button
    class="btn btn-secondary dropdown-toggle"
    type="button"
    id="dropdownMenuButton2"
    data-mdb-toggle="dropdown"
    aria-expanded="false"
    style="width:100%;"
  >
    Prikazi za:
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
    <li><a class="dropdown-item <?php if($vreme == "7dana"){echo "active";} ?>" href="prikazi.php?exc=<?php echo $exc; ?>&vreme=7dana">Zadnjih nedelju dana</a></li>
    <li><a class="dropdown-item <?php if($vreme == "1mesec"){echo "active";} ?>" href="prikazi.php?exc=<?php echo $exc; ?>&vreme=1mesec">Zadnjih mesec dana</a></li>
    <li><a class="dropdown-item <?php if($vreme == "2meseca"){echo "active";} ?>" href="prikazi.php?exc=<?php echo $exc; ?>&vreme=2meseca">Zadnja 2 meseca</a></li>
    <li><a class="dropdown-item <?php if($vreme == "3meseca"){echo "active";} ?>" href="prikazi.php?exc=<?php echo $exc; ?>&vreme=3meseca">Zadnja 3 meseca</a></li>
    <li><a class="dropdown-item <?php if($vreme == "6meseci"){echo "active";} ?>" href="prikazi.php?exc=<?php echo $exc; ?>&vreme=6meseci">Zadnjih 6 meseci</a></li>
    <li><a class="dropdown-item <?php if($vreme == "1godina"){echo "active";} ?>" href="prikazi.php?exc=<?php echo $exc; ?>&vreme=1godina">Zadnjih godinu dana</a></li>
    <li><a class="dropdown-item <?php if($vreme == "5unosa"){echo "active";} ?>" href="prikazi.php?exc=<?php echo $exc; ?>&vreme=5unosa">Poslednjih 5 unosa</a></li>
    <li><a class="dropdown-item <?php if($vreme == "oduvek"){echo "active";} ?>" href="prikazi.php?exc=<?php echo $exc; ?>&vreme=oduvek">Oduvek</a></li>
  </ul>
</div>

          </div>
          <script type="text/javascript">
            let exc = "<?php echo $exc; ?>".replaceAll("_", " ");
            document.getElementById('h1').innerHTML = exc + ":";
          </script>
          <?php

            $query_run = mysqli_query($conn, $query);
            if(mysqli_num_rows($query_run)==0){
              ?>
                <h2 class="text-center">Nema podataka <?php echo $br_dana; ?></h2>
              <?php
            } else {

           ?>
          <div id="curve_chart" style='width: 99%; height: 220px;'></div>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Mesec', 'Radna težina (kg)'],
              <?php
                while ($weight_date = mysqli_fetch_assoc($query_run)){
                  $date = date_create($weight_date['date']);
                  $date = date_format($date, "d/m/y");
                  ?>
                  ['<?php echo $date; ?>',  <?php echo $weight_date['weight']; ?>],
                  <?php
                }
            ?>
            ]);
            let ex = "<?php echo $exc.$br_dana; ?>".replaceAll("_", " ");
            var options = {
                  title: ex,
                  colors: ['white'],
                  curveType: 'function',
                  width:'100%',
                  lineWidth:3,
                  pointShape: 'circle',
                  pointSize: 4,
                  backgroundColor: {
                    stroke: "#6b88a9",
                    strokeWidth:2,
                    fill:"466486",
                  },
                  chartArea: {
                    right:10,
                    left:50,
                    backgroundColor: "466486",
                  },
                  legend: {
                    position: 'bottom',
                    textStyle: {color: 'white', fontSize: 12}
                  },
                  hAxis: {
                    direction: '-1',
                    textStyle: {color: "white"},
                  },
                  vAxis: {
                    gridlines: {color: '6b88a9',interval:[1,2,2.5,5,7]},
                    textStyle: {color: "white",},
                  },
                  tooltip: {
                    textStyle: {color: 'black'}
                  },
                  titleTextStyle: {
                    color: 'white'
                  }

                };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
          }
        </script>
      <?php } ?>
        </div>
        <div style="margin:auto;width:250px;">
          <a href="promeni_podatke.php?exc=<?php echo $exc; ?>" class="btn btn-danger nazad">Promeni podatke</a>
          <a href="index.php" class="btn btn-primary nazad" style="margin-top:0 !important;">Vrati se nazad</a>
        </div>
      </div>
      <?php include 'footer.php'; ?>
  </html>
<?php
} else {
  header("Location: index.php");
}

 ?>
