<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!--BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!--GOOGLE CHARTS-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Fitness Grafik - Aplikacija za praćenje napretka u teretani</title>
    <link rel="icon" sizes="50x50" href="photos/logo.png">
    <link rel="apple-touch-icon" href="photos/logo2.jpg">
    <meta name="apple-mobile-web-app-title" content="photos/logo.png">
    <meta name="apple-mobile-web-app-title" content="Fitness Grafik">
    <meta name="description" content="Pratite svoj napredak u teretani uz pomoc Fitness Grafik aplikacije koja vam pruza jasan uvid u statistiku." />
    <meta name="keywords" content="Fitness Grafik, Fitness Aplikacija, Fitness Aplikacija za praćenje napretka u teretani, Aplikacija za teretanu" />
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="initial-scale=1.0">
    <script src="login.js" type="text/javascript"></script>
    <script src="register.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="container-fluid div1">

      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgba(255,255,255,0.04);width:100%;">

        <div class="container">

          <a class="navbar-brand me-2" href="">
            <img src="photos/logo.png" height="40" alt="logo" style="margin-top: -1px;" />
          </a>

          <div class="d-flex align-items-center account_links">
            <button class="btn btn-primary me-3" id="prijavi" data-bs-toggle="modal" data-bs-target="#exampleModal">Prijavi se</button>
          </div>

        </div>

      </nav>

      <div class="container tekst">
        <h1 class="text-center" style="font-family: monospace;">Pratite svoj napredak u teretani pomoću aplikacije koja vam prikazuje napredovanje kroz grafike.</h1>
        <button style="font-size:1.2em;" type="button" class="btn btn-primary btn_modal" data-bs-toggle="modal" data-bs-target="#exampleModal">Započni odmah</button>
      </div>
      <div class="charts container">
        <h1 class="text-center" style="font-family: monospace;background-color: rgba(0,0,0,0.11);">Primer grafika za jednu vežbu:</h1>
        <div class="hover-shadow" id="curve_chart0" style='width: 99%; height: 220px;'></div>

          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart0);

            function drawChart0() {
              var data = google.visualization.arrayToDataTable([
                ['Mesec', 'Radna težina (kg)'],
                            ['18/09/21',  105],
                            ['15/09/21',  100],
                            ['13/09/21',  102.5],
                            ['11/09/21',  100],
                            ['09/09/21',  97.5],
                          ]);
              let ex = "Barbell_Bench_Press".replaceAll("_", " ");
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

              var chart = new google.visualization.LineChart(document.getElementById('curve_chart0'));

              chart.draw(data, options);
            }
          </script>

          </div>
          <div style="margin:40px auto 0;width:186.3px;">
            <a href="1repmax_calculator" class="btn btn-danger nazad">1 Rep Max Kalkulator</a>
          </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Prijavi se ili napravi novi nalog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">


    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
      <li class="nav-item" role="presentation">
        <a
          class="nav-link active"
          id="tab-login"
          data-mdb-toggle="pill"
          href="#pills-login"
          role="tab"
          aria-controls="pills-login"
          aria-selected="true"
        >Prijavi se</a>
      </li>
      <li class="nav-item" role="presentation">
        <a
          class="nav-link"
          id="tab-register"
          data-mdb-toggle="pill"
          href="#pills-register"
          role="tab"
          aria-controls="pills-register"
          aria-selected="false"
          >Napravi nalog</a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

          <form>

            <div class="form-outline mb-4">
              <input id="email" type="email" class="form-control" />
              <label class="form-label" for="loginName">Email ili korisničko ime</label>
            </div>

            <div class="form-outline mb-4">
              <input id="pass" type="password" class="form-control" />
              <label class="form-label" for="loginPassword">Šifra</label>
            </div>

            <div class="row mb-4" style="margin-bottom:15px !important">
              <div class="col-md-6 d-flex justify-content-center">
                <div class="form-check mb-3 mb-md-0">
                  <input class="form-check-input" type="checkbox" id="loginCheck" />
                  <label class="form-check-label" for="loginCheck">Zapamti me</label>
                </div>
              </div>

              <div class="col-md-6 d-flex justify-content-center">
                <a href="forgot_password.php">Zaboravio si šifru?</a>
              </div>
            </div>

            <div class="d-flex justify-content-center mb-4" style="margin-bottom:15px !important">
              <p id="login_status"></p>
            </div>

            <a onclick="loginn()" id="login" class="btn btn-primary btn-block mb-4">Prijavi se</a>

          </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
          <form>

            <div class="form-outline mb-4">
              <input type="text" id="registerName" class="form-control" />
              <label class="form-label" for="registerName">Ime</label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="registerUsername" class="form-control" />
              <label class="form-label" for="registerUsername">Korisničko ime</label>
            </div>

            <div class="form-outline mb-4">
              <input type="email" id="registerEmail" class="form-control" />
              <label class="form-label" for="registerEmail">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="registerPassword" class="form-control" />
              <label class="form-label" for="registerPassword">Šifra</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="registerRepeatPassword" class="form-control" />
              <label class="form-label" for="registerRepeatPassword">Ponovi šifru</label>
            </div>

            <div class="form-check d-flex justify-content-center mb-4"  style="margin-bottom:15px !important">
              <input onchange="prihvatam()" class="form-check-input me-2" type="checkbox" value="" id="registerCheck" aria-describedby="registerCheckHelpText"/>
              <label class="form-check-label" for="registerCheck">
                <p>Prihvatam <a href="uslovi_koriscenja" target="_blank">uslove korišćenja</a></p>
              </label>
            </div>

            <div class="d-flex justify-content-center mb-4" style="margin-bottom:10px !important">
              <p id="status"></p>
            </div>

            <a style="pointer-events:none;" onclick="registerr()" id="register" class="btn btn-dark btn-block mb-3">Napravi nalog</a>
            <script type="text/javascript">
              function prihvatam(){
                var status = document.getElementById("registerCheck");
                var btn = document.getElementById('register');
                if(status.checked==true){
                  btn.style.pointerEvents = "all";
                  btn.style.backgroundColor = "#1266f1";
                } else {
                  btn.style.pointerEvents = "none";
                  btn.style.backgroundColor = "#4f4f4f";
                }
              }
            </script>
          </form>
        </div>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>
  </body>
</html>
