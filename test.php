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
    <title>Fitness Application</title>
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
    </style>
  </head>
  <body>


      <div class="container tekst">
        <button style="font-size:1.2em;" type="button" class="btn btn-primary btn_modal" data-bs-toggle="modal" data-bs-target="#exampleModal">Zapocni odmah</button>
      </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">





          <form>

            <div class="form-outline mb-4">
              <input id="email" type="email" class="form-control" />
              <label class="form-label" for="loginName">Email ili korisnicko ime</label>
            </div>

            <div class="form-outline mb-4">
              <input id="pass" type="password" class="form-control" />
              <label class="form-label" for="loginPassword">Sifra</label>
            </div>

            <div class="row mb-4">
              <div class="col-md-6 d-flex justify-content-center">
                <div class="form-check mb-3 mb-md-0">
                  <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                  <label class="form-check-label" for="loginCheck">Zapamti me</label>
                </div>
              </div>

              <div class="col-md-6 d-flex justify-content-center">
                <a href="forgot_password.php">Zaboravio si sifru?</a>
              </div>
            </div>

            <div class="d-flex justify-content-center mb-4">
              <p id="login_status"></p>
            </div>

            <a onclick="loginn()" id="login" class="btn btn-primary btn-block mb-4">Prijavi se</a>

          </form>


        </div>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
    </div>
  </div>

  </body>
</html>
