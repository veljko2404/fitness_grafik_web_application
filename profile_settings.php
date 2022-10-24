<?php

require 'connect.php';
require 'core.php';
if(loggedin()){
?>
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

      <link rel="stylesheet" href="css/prikazi.css">
      <meta charset="utf-8">
      <title>Podešavanje profila - <?php echo $_SESSION['user_id']['username']; ?> - Fitness Grafik</title>
      <link rel="icon" sizes="50x50" href="photos/logo.png">
      <link rel="apple-touch-icon" href="photos/logo.png">
      <meta name="apple-mobile-web-app-title" content="photos/logo.png">
      <meta name="viewport" content="width=device-width" />
      <meta name="viewport" content="initial-scale=1.0">
      <style media="screen">
      .btn_modal{
        margin:25px auto;
        position: relative;
        left:50%;
        transform: translateX(-50%);
        font-size: 1em;
      }
      .form-outline {
        border:1px solid #bdbdbd !important;
        border-radius: 3px;
      }
      .form {
        background-color: #fff;
        padding:30px;
        border-radius: 3px;
      }
      label {
        background-color: white !important;
        padding-left:4px;
        padding-right:4px;
      }
      #status {
        margin-bottom:0 !important;
      }
      #obrisi_nalog{
        width:150px;
        margin:20px auto 0;
        left:50%;
        transform: translateX(-50%);
        position: relative;
      }
      .modal-body{
        padding-top:50px;
        padding-bottom:30px;
      }
      </style>
    </head>
    <body>

        <div class="container-fluid div1">

          <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgba(255,255,255,0.075);width:100%;">
            <div class="container">
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
                  <li><a class="dropdown-item" href="index.php">Vrati se nazad</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li><a class="dropdown-item" href="logout.php">Izloguj se</a></li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="container form" style="width:95%;max-width:500px !important; margin:50px auto 30px;">

            <div class="form-outline mb-4">
              <input id="username" type="text" class="form-control" />
              <label class="form-label" for="username">Korisničko ime</label>
            </div>
            <a onclick="reset_u()" id="reset_u" class="btn btn-primary btn-block mb-4">Resetuj korisničko ime</a>
            <div class="d-flex justify-content-center mb-4">
              <p id="status_username"></p>
            </div>
            <div class="form-outline mb-4">
              <input id="password_p" type="password" class="form-control" />
              <label class="form-label" for="password_p">Stara šifra</label>
            </div>
            <div class="form-outline mb-4">
              <input id="password_n" type="password" class="form-control" />
              <label class="form-label" for="password_n">Nova šifra</label>
            </div>
            <a onclick="reset_p()" id="reset_p" class="btn btn-primary btn-block mb-4">Resetuj šifru</a>
            <div class="d-flex justify-content-center mb-4">
              <p id="status_password"></p>
            </div>
          <script type="text/javascript">
          //username
          function reset_u() {
            var res = document.getElementById('reset_u');
            res.innerHTML = "Učitavanje...";
            var http = new XMLHttpRequest();
            var username = document.getElementById('username').value;
            var data = 'username=' + username;
            var url = "profile_update.php";
            var status = document.getElementById('status_username');
            http.open('POST', url, true);

            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.onreadystatechange = function() {
              if(http.readyState == 4 && http.status == 200) {
                  if(http.responseText=="ok"){
                    status.innerHTML = "Promene su uspešno napravljene";
                    status.style.color = "#00b74a";
                    res.innerHTML = "Korisničko ime promenjeno";
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
          //Sifra
          function reset_p() {
            var res = document.getElementById('reset_p');
            res.innerHTML = "Učitavanje...";
            var http = new XMLHttpRequest();
            var pass_n = document.getElementById('password_n').value;
            var pass_p = document.getElementById('password_p').value;
            var data = 'new_password=' + pass_n + "&" + 'prev_password=' + pass_p;
            var url = "profile_update.php";
            var status = document.getElementById('status_password');
            http.open('POST', url, true);

            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.onreadystatechange = function() {
              if(http.readyState == 4 && http.status == 200) {
                  if(http.responseText=="ok"){
                    status.innerHTML = "Promene su uspešno napravljene";
                    status.style.color = "#00b74a";
                    res.innerHTML = "Šifra promenjena";
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
          function obrisi_nalog(){
            var res = document.getElementById('obrisi_nalog');
            res.innerHTML = "Učitavanje...";
            var http = new XMLHttpRequest();
            var data = "data";
            var url = "obrisi_nalog.php";
            http.open('POST', url, true);

            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.onreadystatechange = function() {
              if(http.readyState == 4 && http.status == 200) {
                  if(http.responseText=="ok"){
                    res.innerHTML = "OBRISAN";
                    res.style.pointerEvents = "none";
                    res.style.backgroundColor = "#00b74a";
                    alert("Vaš nalog i podaci su uspešno obrisani");
                    location.reload();
                  } else {
                    res.innerHTML = "DOŠLO JE DO GRESKE";
                    alert(http.responseText);
                  }
              }
            }
            http.send(data);
          }
          </script>
        </div>
        <div style="margin:auto;width:250px;">
          <a class="btn btn-danger nazad" data-bs-toggle="modal" data-bs-target="#exampleModal">Obriši nalog i sve podatke</a>
          <a href="index.php" class="btn btn-primary nazad" style="margin-top:0;">Vrati se nazad</a>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">

                <h4 class="text-center text-dark">Da li želiš trajno obrisati nalog i sve podatke?</h4>
                <a onclick="obrisi_nalog()" id="obrisi_nalog" class="btn btn-danger">OBRIŠI</a>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
              </div>
            </div>
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
