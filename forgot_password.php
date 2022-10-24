<?php

require "connect.php";
require "core.php";

if(!loggedin()){

  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Resetuj šifru</title>
      <link rel="icon" sizes="50x50" href="photos/logo.png">
      <link rel="apple-touch-icon" href="photos/logo.png">
      <meta name="apple-mobile-web-app-title" content="photos/logo.png">
      <meta name="viewport" content="width=device-width" />
      <meta name="viewport" content="initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
      <style>
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

      label {
        background-color: white !important;
        padding-left:4px;
        padding-right:4px;
      }
      #status {
        margin-bottom:0 !important;
      }


      </style>
    </head>
    <body>
    <div class="container">
    <div class="container" style="max-width:500px !important;">
    <br><br>
    <form>

      <div class="form-outline mb-4">
        <input id="email" type="email" class="form-control" />
        <label class="form-label" for="email">Email</label>
      </div>

      <div class="d-flex justify-content-center mb-4">
        <p id="status"></p>
      </div>

      <a onclick="reset()" id="reset" class="btn btn-primary btn-block mb-4">Resetuj šifru</a>

    </form>
    <script type="text/javascript">
    function reset() {
      var res = document.getElementById('reset');
      res.innerHTML = "Ucitavanje...";
      var http = new XMLHttpRequest();
      var email = document.getElementById('email').value;
      var data = 'email=' + email;
      var url = "reset_pass.php";
      var status = document.getElementById('status');
      http.open('POST', url, true);

      http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            if(http.responseText=="ok"){
              status.innerHTML = "Poslat vam je mejl sa linkom za resetovanje šifre.";
              status.style.color = "#00b74a";
              res.innerHTML = "Proverite email";
              res.style.pointerEvents = "none";
              res.style.backgroundColor = "#00b74a";
            } else {
              status.innerHTML = http.responseText;
              status.style.color = "#f93154";
              res.innerHTML = "Resetuj šifru";
            }
        }
      }
      http.send(data);
    }

    </script>
  </div>
  </div>
  </body>
  </html>

  <?php

} else {
  header("Location: index.php");
}

 ?>
