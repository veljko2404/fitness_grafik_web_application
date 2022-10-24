<?php

require 'connect.php';
require 'core.php';

if(isset($_GET['reset_email'])&&isset($_GET['verify'])){

?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>

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
      <title>Resetuj šifru - Fitness Grafik</title>
    </head>
    <body>
    <div class="container">
    <div class="container" style="max-width:500px !important;">
    <br><br>
    <form>

      <div class="form-outline mb-4">
        <input id="password" type="name" class="form-control" />
        <label class="form-label" for="password">Unesi novu šifru</label>
      </div>
      <input style="display:none;" type="email" id="email" value="<?php echo $_GET['reset_email']; ?>">
      <input style="display:none;" type="code" id="code" value="<?php echo $_GET['verify']; ?>">

      <div class="d-flex justify-content-center mb-4">
        <p id="status"></p>
      </div>

      <a onclick="reset()" id="reset" class="btn btn-primary btn-block mb-4">Resetuj šifru</a>

      <script type="text/javascript">
      function reset() {
        var res = document.getElementById('reset');
        res.innerHTML = "Učitavanje...";
        var http = new XMLHttpRequest();
        var email = document.getElementById('email').value;
        var code = document.getElementById('code').value;
        var pass = document.getElementById('password').value;
        var data = 'email=' + email + '&pass=' + pass + '&code=' + code;
        var url = "update_pass.php";
        var status = document.getElementById('status');
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.onreadystatechange = function() {
          if(http.readyState == 4 && http.status == 200) {
              if(http.responseText=="ok"){
                status.innerHTML = "Šifra je uspešno promenjena. <a href='index.php'>Vrati se na početnu</a>";
                status.style.color = "#00b74a";
                res.innerHTML = "Resetovana šifra!";
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

    </form>

  </div>
  </div>
  </body>
  </html>
<?php
} else {

$code = md5(rand());
$email = input($_POST['email']);

if(!loggedin()){
  if(isset($email)){
    if(!empty($email)){
      $query_email = "SELECT * FROM `users` WHERE `email`='$email'";
      $query_run_email = mysqli_query($conn, $query_email);
      if(mysqli_num_rows($query_run_email) == 1){
        $user_id = mysqli_fetch_assoc($query_run_email);
        $id = $user_id['id'];
        if($user_id['ok']==1){
          $query_reset = "UPDATE `users` SET `verify` = '$code' WHERE `users`.`id` = '$id'";
          if(mysqli_query($conn, $query_reset)){
            $link = "https://fitnessgrafik.com/reset_pass.php?verify=".$code."&reset_email=".$email;
            if(mail($user_id['email'],"Resetuj sifru", "Klikni ovde da resetujes sifru: '$link'", "from: no-reply@fitnessgrafik.com")){
              echo 'ok';
            } else {
              echo 'Doslo je do greske';
            }
          } else {
            echo 'Doslo je do greske!';
          }
        } else {
          echo "Nalog mora biti verifikovan!";
        }
      } else {
        echo "Email nije pronadjen!";
      }
    } else {
      echo "Polje za email mora biti popunjeno!";
    }
  } else {
    echo "Polje za email mora biti popunjeno!";
  }
} else {
  header("Location: index.php");
}

}

?>
