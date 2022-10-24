function registerr() {
  var reg = document.getElementById('register');
  reg.innerHTML = "Učitavanje...";
  var http = new XMLHttpRequest();
  var email = document.getElementById('registerEmail').value;
  var pass = document.getElementById('registerPassword').value;
  var passr = document.getElementById('registerRepeatPassword').value;
  var ime = document.getElementById('registerName').value;
  var username = document.getElementById('registerUsername').value;
  var data = 'email=' + email + '&pass=' + pass + '&ime=' + ime + '&passr=' + passr + '&username=' + username;
  var url = "register.php";
  var status = document.getElementById('status');
  http.open('POST', url, true);

  http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
        if(http.responseText=="ok"){
          status.innerHTML = "Poslat vam je mejl sa linkom za verifikaciju. Pogledajte i neželjenu poštu.";
          status.style.color = "#00b74a";
          reg.innerHTML = "Uspešno napravljen nalog";
          reg.style.pointerEvents = "none";
          reg.style.backgroundColor = "#00b74a";
        } else {
          status.innerHTML = http.responseText;
          status.style.color = "#f93154";
          reg.innerHTML = "Napravi nalog";
        }
    }
  }
  http.send(data);
}
