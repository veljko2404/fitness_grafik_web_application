<?php

require 'connect.php';
require 'core.php';
if(loggedin()){
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
      <title>Sve unete vežbe - Fitness Grafik</title>
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

                <ul class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
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
          <h1 class="text-center">Grafici svih unetih vežbi:</h1>
          <?php
            $user = $_SESSION['user_id'];
            $username = $user['username'];
            $query_check = "SELECT `id` FROM `$username` LIMIT 1";
            $query_run_check = mysqli_query($conn, $query_check);
            if(mysqli_num_rows($query_run_check)==0){
              ?>
              <h1 class="text-center text-warning">Niste uneli nijednu vežbu</h1>
              <?php
            } else {
              $query_get_data = "SELECT DISTINCT `excercise` FROM `$username` ORDER BY id DESC LIMIT 99999";
              $query_run_get_data = mysqli_query($conn, $query_get_data);
              $count = 0;
              while ($data = mysqli_fetch_assoc($query_run_get_data)){
                $exc = $data["excercise"];
                $query_get_all = "SELECT * FROM `$username` WHERE `excercise`='$exc' ORDER BY id DESC LIMIT 5";
                $query_run_get_all = mysqli_query($conn, $query_get_all);

           ?>
          <div id="curve_chart<?php echo $count; ?>" style='width: 99%; height: 220px;'></div>
          <div class="det">
            <a href="prikazi.php?exc=<?php echo $exc; ?>&vreme=1mesec" class="btn btn-info detaljnije">Prikaži detaljnije</a>
          </div>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart<?php echo $count; ?>);

          function drawChart<?php echo $count; ?>() {
            var data = google.visualization.arrayToDataTable([
              ['Month', 'Radna težina (kg)'],
              <?php while ($weight_date = mysqli_fetch_assoc($query_run_get_all)){
                $date = date_create($weight_date['date']);
                $date = date_format($date, "d/m/y");
                 ?>
              ['<?php echo $date; ?>',  <?php echo $weight_date['weight']; ?>],
              <?php } ?>
            ]);
            let ex = "<?php echo $exc; ?>".replaceAll("_", " ");
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

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart<?php echo $count; ?>'));

            chart.draw(data, options);
          }
        </script>
      <?php
        $count++;
          }
          ?><?php
        }
      ?>
        </div>

        <div style="margin:auto;width:250px;">
          <a href="index.php" class="btn btn-primary nazad">Vrati se nazad</a>
        </div>
      </div>
      <?php include 'footer.php'; ?>
  </html>
<?php
} else {
  header("Location: index.php");
}

 ?>
