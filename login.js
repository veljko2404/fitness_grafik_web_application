function loginn() {
  var log = document.getElementById('login');
  var status = document.getElementById('login_status');
  log.innerHTML = "Prijavljivanje...";
  var http = new XMLHttpRequest();
  var email = document.getElementById('email').value;
  var pass = document.getElementById('pass').value;
  var checked = document.getElementById('loginCheck');
  if(checked.checked==true){
    var zapamti = "true";
  } else {
    var zapamti = "false";
  }
  var data = 'email=' + email + '&pass=' + pass + "&zapamti=" + zapamti;
  var url = "login.php";
  http.open('POST', url, true);

  http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
        if(http.responseText=="ok"){
          status.innerHTML = "Uspešno prijavljivanje!";
          status.style.color = "#00b74a";
          log.innerHTML = "Uspešno prijavljivanje!";
          log.style.pointerEvents = "none";
          log.style.backgroundColor = "#00b74a";
          location.reload();
        } else {
          status.innerHTML = http.responseText;
          status.style.color = "#f93154";
          log.innerHTML = "Prijavi me";
        }
    }
  }
  http.send(data);
}
