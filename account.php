<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- BOOTSTRAP JS 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!--GOOGLE CHARTS-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--JQUERY CHOSEN FOR MULTIPLE SELECTION-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">

    <link rel="stylesheet" href="css/profile_style.css">
    <meta charset="utf-8">
    <title><?php echo $_SESSION['user_id']['username'] ?> - Fitness Grafik</title>
    <meta name="description" content="Unesite današnji trening, pogledajte grafike poslednje unetih vežbi" />
    <link rel="icon" sizes="50x50" href="photos/logo.png">
    <link rel="apple-touch-icon" href="photos/logo2.jpg">
    <meta name="apple-mobile-web-app-title" content="photos/logo.png">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="initial-scale=1.0">
  </head>
  <body>

      <div class="container-fluid div1">

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgba(255,255,255,0.075);width:100%;">
          <div class="container">
            <a class="navbar-brand me-2">
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

        <div class="container tekst">
          <h1 class="text-center" style="font-family: monospace;"></h1>
          <button style="font-size:1.2em;" type="button" class="btn btn-success btn_modal" data-bs-toggle="modal" data-bs-target="#exampleModal">Dodaj današnji trening</button>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button id="close-x" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <button id="close-x-refresh" style="display:none;" class="btn-close" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form id="training">

                  <div class="container-fluid slide" id="prvi">
                    <p>Šta si radio/la danas?</p>
                    <select id="select1" class="chosen-select">
                      <option value="Shoulders">Shoulders</option>
                      <option value="Arms">Arms</option>
                      <option value="Back">Back</option>
                      <option value="Chest">Chest</option>
                      <option value="Legs">Legs</option>
                      <option value="Pull">Pull</option>
                      <option value="Push">Push</option>
                      <option value="Upper">Upper</option>
                      <option value="Full Body" selected>Full Body</option>
                      <option style="display:none;" selected value="/">Odaberi ovde</option>
                    </select>
                  </div>

                  <div class="container-fluid slide" id="drugi">
                    <p>Koje vežbe si radio/la?</p>
                    <select id="select2" multiple data-placeholder="Odaberi vežbe...">
                    </select>
                    <div class="next">
                      <a id="sledece2" class="btn btn-dark" style="pointer-events: none;margin-left:10px;">Sledeće</a>
                      <a id="prethodno1" class="btn btn-primary">Prethodno</a>
                    </div>
                  </div>
                  <script type="text/javascript">
                  function vrednost(br){
                    range = "range" + br;
                    var s = document.getElementById(range);
                    var id = "weight" + br;
                    document.getElementById(id).innerHTML = s.value;
                  }
                  </script>
                  <div class="container-fluid slide" id="treci">
                    <div id="treci_slide" style="margin-bottom:20px;">

                    </div>
                    <a id="posalji"  class="btn btn-success" style="margin-left:10px;">Dodaj Trening</a>
                    <a id="prethodno2" class="btn btn-primary">Prethodno</a>
                  </div>
                  <script type="text/javascript">
                    $(document).ready(function(){
                      $("#select1").chosen();
                      $("#prethodno1").click(function(){
                        $("#drugi").css("display" , "none");
                        $("#prvi").css("display" , "block");
                        $("#select2").chosen("destroy");
                      });
                      $("#select1").change(function(){
                        $("#prvi").css("display" , "none");
                        $("#drugi").css("display" , "block");
                        var val = $(this).val();
                        if(val == "Full Body"){
                          $("#select2").html("<optgroup label='CHEST'><option value='Barbell Bench Press'>Barbell Bench Press</option><option value='Incline Barbell Bench Press'>Incline Barbell Bench Press</option><option value='Dumbbell Press'>Dumbbell Press</option><option value='Incline Dumbbell Press'>Incline Dumbbell Press</option><option value='Machine Chest Press'>Machine Chest Press</option><option value='Incline Machine Chest Press'>Incline Machine Chest Press</option><option value='Chest Dip'>Chest Dip</option><option value='Pec Deck'>Pec Deck</option><option value='Cable Crossover'>Cable Crossover</option></optgroup><optgroup label='ANTERIOR DELTOID'><option value='Barbell Overhead Press'>Barbell Overhead Press</option><option value='Dumbbell Overhead Press'>Dumbbell Overhead Press</option><option value='Machine Shoulder Press'>Machine Shoulder Press</option><option value='Arnold Press'>Arnold Press</option></optgroup><optgroup label='LATERAL DELTOID'><option value='Lateral Raises'>Lateral Raises</option><option value='Machine Lateral Raises'>Machine Lateral Raises</option></optgroup><optgroup label='TRICEPS'><option value='EZ Bar Skullcrusher'>EZ Bar Skullcrusher</option><option value='Triceps Dip'>Triceps Dip</option><option value='Triceps Pushdown'>Triceps Pushdown</option><option value='Dumbbell Skullcrusher'>Dumbbell Skullcrusher</option><option value='Close Grip Benchpress'>Close Grip Benchpress</option><option value='Dip Machine'>Dip Machine</option><option value='Triceps Kick Back'>Triceps Kick Back</option></optgroup><optgroup label='BACK'><option value='Weighted Pull Up'>Weighted Pull Up</option><option value='Barbell Row'>Barbell Row</option><option value='Lat Pull Down'>Lat Pull Down</option><option value='Machine Row'>Machine Row</option><option value='Chest Supported Machine Row'>Chest Supported Machine Row</option><option value='Dumbbell Row'>Dumbbell Row</option><option value='Barbell Shrug'>Barbell Shrug</option><option value='Deadlift'>Deadlift</option><option value='Straight Arm Pulldown'>Straight Arm Pulldown</option><option value='T-Bar Row'>T-Bar Row</option><option value='Hyperextension'>Hyperextension</option><option value='Rack Pull'>Rack Pull</option></optgroup><optgroup label='BICEPS'><option value='Standing EZ Bar Curl'>Standing EZ Bar Curl</option><option value='Preacher Curl'>Preacher Curl</option><option value='Machine Bicep Curl'>Machine Bicep Curl</option><option value='Dumbbell Bicep Curl'>Dumbbell Bicep Curl</option><option value='Incline Dumbbell Curl'>Incline Dumbbell Curl</option><option value='Cable Curl'>Cable Curl</option><option value='Hammer Curl'>Hammer Curl</option></optgroup><optgroup label='POSTERIOR DELTOID'><option value='Facepulls'>Facepulls</option><option value='Reverse Pec Deck'>Reverse Pec Deck</option><option value='Rear Delt Fly'>Rear Delt Fly</option><option value='Cable Rear Delt'>Cable Rear Delt</option></optgroup><optgroup label='LEGS'><option value='Barbell Squat'>Barbell Squat</option><option value='Machine Squat'>Machine Squat</option><option value='Front Squat'><Front Squat/option><option value='Deadlift'>Deadlift</option><option value='Romanian Deadlift'>Romanian Deadlift</option><option value='Leg Press'>Leg Press</option><option value='Front Squat'>Front Squat</option><option value='Walking Lunge'>Walking Lunge</option><option value='Bulgarian Split Squat'>Bulgarian Split Squat</option><option value='Hip Thrust'>Hip Thrust</option><option value='Abductor Machine'>Abductor Machine</option><option value='Leg Extension'>Leg Extension</option><option value='Leg Curl'>Leg Curl</option><option value='Calf Raises'>Calf Raises</option></optgroup>");
                          $("#select2").chosen();
                        } else if(val == "Upper"){
                          $("#select2").html("<optgroup label='CHEST'><option value='Barbell Bench Press'>Barbell Bench Press</option><option value='Incline Barbell Bench Press'>Incline Barbell Bench Press</option><option value='Dumbbell Press'>Dumbbell Press</option><option value='Incline Dumbbell Press'>Incline Dumbbell Press</option><option value='Machine Chest Press'>Machine Chest Press</option><option value='Incline Machine Chest Press'>Incline Machine Chest Press</option><option value='Chest Dip'>Chest Dip</option><option value='Pec Deck'>Pec Deck</option><option value='Cable Crossover'>Cable Crossover</option></optgroup><optgroup label='ANTERIOR DELTOID'><option value='Barbell Overhead Press'>Barbell Overhead Press</option><option value='Dumbbell Overhead Press'>Dumbbell Overhead Press</option><option value='Machine Shoulder Press'>Machine Shoulder Press</option><option value='Arnold Press'>Arnold Press</option></optgroup><optgroup label='LATERAL DELTOID'><option value='Lateral Raises'>Lateral Raises</option><option value='Machine Lateral Raises'>Machine Lateral Raises</option></optgroup><optgroup label='TRICEPS'><option value='EZ Bar Skullcrusher'>EZ Bar Skullcrusher</option><option value='Triceps Dip'>Triceps Dip</option><option value='Triceps Pushdown'>Triceps Pushdown</option><option value='Dumbbell Skullcrusher'>Dumbbell Skullcrusher</option><option value='Close Grip Benchpress'>Close Grip Benchpress</option><option value='Dip Machine'>Dip Machine</option><option value='Triceps Kick Back'>Triceps Kick Back</option></optgroup><optgroup label='BACK'><option value='Weighted Pull Up'>Weighted Pull Up</option><option value='Barbell Row'>Barbell Row</option><option value='Lat Pull Down'>Lat Pull Down</option><option value='Machine Row'>Machine Row</option><option value='Chest Supported Machine Row'>Chest Supported Machine Row</option><option value='Dumbbell Row'>Dumbbell Row</option><option value='Barbell Shrug'>Barbell Shrug</option><option value='Deadlift'>Deadlift</option><option value='Straight Arm Pulldown'>Straight Arm Pulldown</option><option value='T-Bar Row'>T-Bar Row</option><option value='Hyperextension'>Hyperextension</option><option value='Rack Pull'>Rack Pull</option></optgroup><optgroup label='BICEPS'><option value='Standing EZ Bar Curl'>Standing EZ Bar Curl</option><option value='Preacher Curl'>Preacher Curl</option><option value='Machine Bicep Curl'>Machine Bicep Curl</option><option value='Dumbbell Bicep Curl'>Dumbbell Bicep Curl</option><option value='Incline Dumbbell Curl'>Incline Dumbbell Curl</option><option value='Cable Curl'>Cable Curl</option><option value='Hammer Curl'>Hammer Curl</option></optgroup><optgroup label='POSTERIOR DELTOID'><option value='Facepulls'>Facepulls</option><option value='Reverse Pec Deck'>Reverse Pec Deck</option><option value='Rear Delt Fly'>Rear Delt Fly</option><option value='Cable Rear Delt'>Cable Rear Delt</option></optgroup>");
                          $("#select2").chosen();
                        } else if(val == "Push"){
                          $("#select2").html("<optgroup label='CHEST'><option value='Barbell Bench Press'>Barbell Bench Press</option><option value='Incline Barbell Bench Press'>Incline Barbell Bench Press</option><option value='Dumbbell Press'>Dumbbell Press</option><option value='Incline Dumbbell Press'>Incline Dumbbell Press</option><option value='Machine Chest Press'>Machine Chest Press</option><option value='Incline Machine Chest Press'>Incline Machine Chest Press</option><option value='Chest Dip'>Chest Dip</option><option value='Pec Deck'>Pec Deck</option><option value='Cable Crossover'>Cable Crossover</option></optgroup><optgroup label='ANTERIOR DELTOID'><option value='Barbell Overhead Press'>Barbell Overhead Press</option><option value='Dumbbell Overhead Press'>Dumbbell Overhead Press</option><option value='Machine Shoulder Press'>Machine Shoulder Press</option><option value='Arnold Press'>Arnold Press</option></optgroup><optgroup label='LATERAL DELTOID'><option value='Lateral Raises'>Lateral Raises</option><option value='Machine Lateral Raises'>Machine Lateral Raises</option></optgroup><optgroup label='TRICEPS'><option value='EZ Bar Skullcrusher'>EZ Bar Skullcrusher</option><option value='Triceps Dip'>Triceps Dip</option><option value='Triceps Pushdown'>Triceps Pushdown</option><option value='Dumbbell Skullcrusher'>Dumbbell Skullcrusher</option><option value='Close Grip Benchpress'>Close Grip Benchpress</option><option value='Dip Machine'>Dip Machine</option><option value='Triceps Kick Back'>Triceps Kick Back</option></optgroup>");
                          $("#select2").chosen();
                        } else if(val == "Pull"){
                          $("#select2").html("<optgroup label='BACK'><option value='Weighted Pull Up'>Weighted Pull Up</option><option value='Barbell Row'>Barbell Row</option><option value='Lat Pull Down'>Lat Pull Down</option><option value='Machine Row'>Machine Row</option><option value='Chest Supported Machine Row'>Chest Supported Machine Row</option><option value='Dumbbell Row'>Dumbbell Row</option><option value='Barbell Shrug'>Barbell Shrug</option><option value='Deadlift'>Deadlift</option><option value='Straight Arm Pulldown'>Straight Arm Pulldown</option><option value='T-Bar Row'>T-Bar Row</option><option value='Hyperextension'>Hyperextension</option><option value='Rack Pull'>Rack Pull</option></optgroup><optgroup label='BICEPS'><option value='Standing EZ Bar Curl'>Standing EZ Bar Curl</option><option value='Preacher Curl'>Preacher Curl</option><option value='Machine Bicep Curl'>Machine Bicep Curl</option><option value='Dumbbell Bicep Curl'>Dumbbell Bicep Curl</option><option value='Incline Dumbbell Curl'>Incline Dumbbell Curl</option><option value='Cable Curl'>Cable Curl</option><option value='Hammer Curl'>Hammer Curl</option></optgroup><optgroup label='POSTERIOR DELTOID'><option value='Facepulls'>Facepulls</option><option value='Reverse Pec Deck'>Reverse Pec Deck</option><option value='Rear Delt Fly'>Rear Delt Fly</option><option value='Cable Rear Delt'>Cable Rear Delt</option></optgroup>");
                          $("#select2").chosen();
                        } else if(val == "Legs"){
                          $("#select2").html("<option value='Barbell Squat'>Barbell Squat</option><option value='Machine Squat'>Machine Squat</option><option value='Front Squat'><Front Squat/option><option value='Deadlift'>Deadlift</option><option value='Romanian Deadlift'>Romanian Deadlift</option><option value='Leg Press'>Leg Press</option><option value='Front Squat'>Front Squat</option><option value='Walking Lunge'>Walking Lunge</option><option value='Bulgarian Split Squat'>Bulgarian Split Squat</option><option value='Hip Thrust'>Hip Thrust</option><option value='Abductor Machine'>Abductor Machine</option><option value='Leg Extension'>Leg Extension</option><option value='Leg Curl'>Leg Curl</option><option value='Calf Raises'>Calf Raises</option>");
                          $("#select2").chosen();
                        } else if(val == "Chest"){
                          $("#select2").html("<option value='Barbell Bench Press'>Barbell Bench Press</option><option value='Incline Barbell Bench Press'>Incline Barbell Bench Press</option><option value='Dumbbell Press'>Dumbbell Press</option><option value='Incline Dumbbell Press'>Incline Dumbbell Press</option><option value='Machine Chest Press'>Machine Chest Press</option><option value='Incline Machine Chest Press'>Incline Machine Chest Press</option><option value='Chest Dip'>Chest Dip</option><option value='Pec Deck'>Pec Deck</option><option value='Cable Crossover'>Cable Crossover</option>");
                          $("#select2").chosen();
                        } else if(val == "Back"){
                          $("#select2").html("<option value='Weighted Pull Up'>Weighted Pull Up</option><option value='Barbell Row'>Barbell Row</option><option value='Lat Pull Down'>Lat Pull Down</option><option value='Machine Row'>Machine Row</option><option value='Chest Supported Machine Row'>Chest Supported Machine Row</option><option value='Dumbbell Row'>Dumbbell Row</option><option value='Barbell Shrug'>Barbell Shrug</option><option value='Deadlift'>Deadlift</option><option value='Straight Arm Pulldown'>Straight Arm Pulldown</option><option value='T-Bar Row'>T-Bar Row</option><option value='Hyperextension'>Hyperextension</option><option value='Rack Pull'>Rack Pull</option>");
                          $("#select2").chosen();
                        } else if(val == "Arms"){
                          $("#select2").html("<optgroup label='TRICEPS'><option value='EZ Bar Skullcrusher'>EZ Bar Skullcrusher</option><option value='Triceps Dip'>Triceps Dip</option><option value='Triceps Pushdown'>Triceps Pushdown</option><option value='Dumbbell Skullcrusher'>Dumbbell Skullcrusher</option><option value='Close Grip Benchpress'>Close Grip Benchpress</option><option value='Dip Machine'>Dip Machine</option><option value='Triceps Kick Back'>Triceps Kick Back</option></optgroup><optgroup label='BICEPS'><option value='Standing EZ Bar Curl'>Standing EZ Bar Curl</option><option value='Preacher Curl'>Preacher Curl</option><option value='Machine Bicep Curl'>Machine Bicep Curl</option><option value='Dumbbell Bicep Curl'>Dumbbell Bicep Curl</option><option value='Incline Dumbbell Curl'>Incline Dumbbell Curl</option><option value='Cable Curl'>Cable Curl</option><option value='Hammer Curl'>Hammer Curl</option></optgroup>");
                          $("#select2").chosen();
                        } else if(val == "Shoulders"){
                          $("#select2").html("<optgroup label='ANTERIOR DELTOID'><option value='Barbell Overhead Press'>Barbell Overhead Press</option><option value='Dumbbell Overhead Press'>Dumbbell Overhead Press</option><option value='Machine Shoulder Press'>Machine Shoulder Press</option><option value='Arnold Press'>Arnold Press</option></optgroup><optgroup label='LATERAL DELTOID'><option value='Lateral Raises'>Lateral Raises</option><option value='Machine Lateral Raises'>Machine Lateral Raises</option></optgroup><optgroup label='POSTERIOR DELTOID'><option value='Facepulls'>Facepulls</option><option value='Reverse Pec Deck'>Reverse Pec Deck</option><option value='Rear Delt Fly'>Rear Delt Fly</option><option value='Cable Rear Delt'>Cable Rear Delt</option></optgroup>");
                          $("#select2").chosen();
                        }
                      });
                      $("#sledece2").click(function(){
                        $("#drugi").css("display" , "none");
                        $("#treci").css("display" , "block");
                        var data = $("#select2").val();
                        num = data.length;
                        for(var i=0;i<num;i++){
                          $("#treci_slide").append("<label for='range"+i+"' class='form-label'>"+data[i]+": <span id='weight"+i+"'> 2.5 </span> kg</label><div class='range'><input value='2.5' type='range' oninput='vrednost("+i+")' class='form-range' min='2.5' max='200' step='2.5' id='range"+i+"' /></div>");
                        }
                      });
                      $("#select2").change(function(){
                        var x = $("#select2").val();
                        if(x==""){
                          $("#sledece2").css({'pointer-events' : 'none', 'background-color' : '#262626'});
                        } else {
                          $("#sledece2").css({'pointer-events': 'all', 'background-color' : '#1266f1'});
                        }
                      });
                      $("#prethodno2").click(function(){
                        $("#treci_slide").empty();
                        $("#treci").css("display" , "none");
                        $("#drugi").css("display" , "block");
                      });
                      $("#posalji").click(function(){
                        var vezbe = $("#select2").val();
                        var send = "";
                        for(var i = 0; i < vezbe.length; i++){
                          var range = $("#range"+i).val();
                          if(i==vezbe.length-1){
                            send = send + vezbe[i] + "=" + range;
                          } else {
                            send = send + vezbe[i] + "=" + range + "&";
                          }
                        }
                        $("#posalji").html("Ucitavanje...");
                        $.ajax({
                          url:"dodajtrening.php",
                          method:"POST",
                          data:send,
                          dataType:"text",
                          success:function(data){
                            if(data == '') {
                              $("#posalji").css('pointer-events', 'none');
                              $("#posalji").html('Uspešno ste dodali trening');
                              $("#normal-close").css('display', 'none');
                              $("#refresh").css('display', 'block');
                              $("#close-x").css('display', 'none');
                              $("#close-x-refresh").css('display', 'block');
                              $("#status").html("Klikni na 'zatvori'");
                              $("#status-show").css({'display' : 'block' , "color" : "#00b74a"});
                              $("#prethodno2").css('display', 'none');
                            } else {
                              $("#status").html(data);
                              $("#status-show").css('display', 'block');
                              $("#posalji").html("Pokušaj Ponovo");
                              $("#status-show").css({'display' : 'block' , "color" : "#f93154"});
                            }
                          }
                        });
                      });
                      $("#refresh").click(function(){
                        location.reload();
                      });
                      $("#close-x-refresh").click(function(){
                        location.reload();
                      });
                    });
                  </script>
                </form>
                <div class="d-flex justify-content-center mb-4" id="status-show" style="display:none;">
                  <p id="status"></p>
                </div>

              <div class="modal-footer">
                <button id="normal-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin:10px 0 0 0;">Zatvori</button>
                <button id="refresh" class="btn btn-secondary" style="margin:10px 0 0 0;display:none;">Zatvori</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="charts container">
        <h1 class="text-center">Grafici poslednje unetih vežbi:</h1>
        <?php
          $user = $_SESSION['user_id'];
          $username = $user['username'];
          $query_check = "SELECT `id` FROM `$username` LIMIT 1";
          $query_run_check = mysqli_query($conn, $query_check);
          if(mysqli_num_rows($query_run_check)==0){
            ?>
            <h1 class="text-center text-warning">Niste uneli nijednu vežbu!</h1>
            <?php
          } else {
            $query_get_data = "SELECT DISTINCT `excercise` FROM `$username` ORDER BY id DESC LIMIT 5";
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
            ['Mesec', 'Radna težina (kg)'],
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
        ?>
        <div style="margin:auto;width:220px;">
          <a href="prikazi_sve.php" class="btn btn-danger sve">Prikaži sve vežbe</a>
        </div>
        <?php
      }
    ?>

      </div>
    </div>
    <?php
      include 'footer.php';
    ?>
</html>
