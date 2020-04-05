<?php
session_start();

if (isset($_SESSION['admin'])) {
  header("Location:home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>لوحة التحكم</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bulma.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>


<section class="section home_div">
  <div class="container">
    <div class="columns">

      <div class="column is-6 is-offset-3">
        <div class="admin_div">
          

        <form onsubmit="event.preventDefault(); login()" class="login_form">
          <div class="notification is-danger" id="error" style="display: none;"></div>

          <div class="field">
            <label class="label">اسم مستخدم</label>
            <div class="control">
            <input class="input" type="text" id="user" oninput="chk_user()" placeholder="username">
            </div>
          </div>
          <div class="notification is-danger" id="user_error" style="display: none;"></div>

          <div class="field">
            <label class="label">كلمة المرور</label>
            <div class="control">
            <input class="input" type="password" id="pass" oninput="chk_pass()" placeholder="password">
            </div>
          </div>
          <div class="notification is-danger" id="pass_error" style="display: none;"></div>

          <div class="form_btn">
            <input type="submit" class="button is-link" value="تسجيل الدخول" id="submit" disabled>
          </div>
        </form>
      </div>
      </div>

    </div>
  </div>
</section>

<script type="text/javascript">
var msg1 = 'اسم مستخدم خاطئ';
var msg2 = 'كلمة مرور خاطئه';
var msg3 = 'اسم المستخدم او كلمة المرور غير صحيحه';
var msg4 = 'ادخال خاطئ';
var msg5 = 'حدث خطأ في الاتصال يرجى اعادة المحاولة';

var user_submit = false;
var pass_submit = false;

function chk_user() {
  var value = document.getElementById("user").value;
  var error_elm = document.getElementById("user_error");
  var reg = /^([a-zA-Z0-9_.]){1,30}$/;
  if (reg.test(value)) {
    error_elm.innerHTML = '';
    error_elm.style.display = 'none';
    if (pass_submit) {
      document.getElementById('submit').disabled = false;
    }
    user_submit = true;
  }else{
    error_elm.innerHTML = msg1;
    error_elm.style.display = 'block';
    document.getElementById('submit').disabled = true;
    user_submit = false;
  }
  return user_submit;
}

function chk_pass() {
  var value = document.getElementById("pass").value;
  var error_elm = document.getElementById("pass_error");
  var reg = /^([a-zA-Z0-9_.]){1,30}$/;
  if (reg.test(value)) {
    error_elm.innerHTML = '';
    error_elm.style.display = 'none';
    if (user_submit) {
      document.getElementById('submit').disabled = false;
    }
    pass_submit = true;
  }else{
    error_elm.innerHTML = msg2;
    error_elm.style.display = 'block';
    document.getElementById('submit').disabled = true;
    pass_submit = false;
  }
  return pass_submit;
}

function login() {
  if (chk_user() && chk_pass()) {
    document.getElementById('submit').disabled = true;
    var user = document.getElementById('user').value;
    var pass = document.getElementById('pass').value;
    var error_elm = document.getElementById("error");

    fetch('php/login.php', {
        method: 'post',
        headers: {
          "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        credentials: 'same-origin',
        body: 'user='+user+'&pass='+pass
    })
    .then((response) => {
          response.json().then(function(data) {
          if (data === true) {
            location.reload();
          }else if(data === false){
            error_elm.innerHTML = msg3;
            error_elm.style.display = 'block';
          }else if(data === 0){
            error_elm.innerHTML = msg4;
            error_elm.style.display = 'block';
          }
      document.getElementById('submit').disabled = false;
        });
    })
    .catch((error) => {
      error_elm.innerHTML = msg5;
      error_elm.style.display = 'block';
      document.getElementById('submit').disabled = false;
    });

    return false;
  }
}

</script>
</body>
</html>