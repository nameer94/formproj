<?php
session_start();
$uid = '';
for ($i=0; $i < 12; $i++) { 
	$uid = $uid.''.rand(0,9);
}
$_SESSION['rantoken'] = $uid;
?>
<!DOCTYPE html>
<html>
<head>
	<title>اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="css/loader.css">
	<link href="https://fonts.googleapis.com/css?family=Almarai&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css?id=<?php echo rand(10000,9999999); ?>">

	<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.css" />
</head>
<body>

	<div class="pageloader is-active is-link" id="loading"><span class="title">جاري التحميل</span></div>

	<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
	<img src="css/logo.png" />


<div class="container">

<form id="formElm" method="post" onsubmit="event.preventDefault(); submitForm();" action="php/addform.php">


<div class="htitle" style="margin-bottom: 10px">
	<h3>استمارة رب الاسرة</h3>
</div>

<article class="panel is-link" style="background: #fff; height: 100%">
  <p class="panel-heading">
      معلومات رب الاسرة 
  </p>
	<h2 style="margin-top: 20px">الاسم الرباعي لرب الاسرة حسب البطاقة التموينية</h2>
	<div class="field is-horizontal">
	    <div class="field column">
			<label>الاسم الاول</label>
			<input type="text" name="name" onchange="chk_text(this, 'error2', 1, 20)" />
			<div class="error" id="error2"></div>
	    </div>
	    <div class="field column">
			<label>الاسم الثاني</label>
			<input type="text" name="fName" onchange="chk_text(this, 'error3', 1, 20)" />
			<div class="error" id="error3"></div>
	    </div>
	    <div class="field column">
			<label>الاسم الثالث</label>
			<input type="text" name="g1Name" onchange="chk_text(this, 'error4', 1, 20)" />
			<div class="error" id="error4"></div>
	    </div>
	    <div class="field column">
			<label>الاسم الرابع</label>
			<input type="text" name="g2Name" onchange="chk_text(this, 'error5', 1, 20)" />
			<div class="error" id="error5"></div>
	    </div>
	</div>

			<input type="hidden" name="phone" id="phone" />
			
	<div class="field is-horizontal">
	    <div class="field column">
			<label>اسم الام الاول</label>
			<input type="text" name="mName" onchange="chk_text(this, 'error6', 1, 20)" />
			<div class="error" id="error6"></div>
	    </div>
	    <div class="field column">
			<label>اسم الام الثاني</label>
			<input type="text" name="mName1" onchange="chk_text(this, 'error6m1', 1, 20)" />
			<div class="error" id="error6m1"></div>
	    </div>
	    <div class="field column">
			<label>اسم الام الثالث</label>
			<input type="text" name="mName2" onchange="chk_text(this, 'error6m2', 1, 20)" />
			<div class="error" id="error6m2"></div>
	    </div>
	    <div class="field column">
			<label>التولد</label>
			<select name="bdday" onchange="chk_select(this, 'errorbd')">
				<option value="0" selected>يوم</option>
				<?php
				for ($i=1; $i < 32; $i++) { 
				?>
				<option value="<?php echo $i ?>"><?php echo $i ?></option>
				<?php
				}
				?>
			</select>
	    </div>
	    <div class="field column">
			<label style="opacity: 0;">.</label>
			<select name="bdmonth" onchange="chk_select(this, 'errorbd')">
				<option value="0" selected>شهر</option>
				<?php
				$months = array('', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
				for ($i=1; $i < 13; $i++) { 
				?>
				<option value="<?php echo $i ?>"><?php echo $months[$i] ?></option>
				<?php
				}
				?>
			</select>
	    </div>
	    <div class="field column">
			<label style="opacity: 0;">.</label>
			<select name="bdyear" onchange="chk_select(this, 'errorbd')">
				<option value="0" selected>سنة</option>
				<?php
				for ($i=1930; $i < 2021; $i++) { 
				?>
				<option value="<?php echo $i ?>"><?php echo $i ?></option>
				<?php
				}
				?>
			</select>
			<div class="error" id="errorbd"></div>
	    </div>
	    <div class="field column">
			<label>المهنة</label>
			<select name="job" onchange="chk_select(this, 'errorjob')">
				<option value="0" selected>اختر</option>

				<option value="1">طالب</option>
				<option value="2">موظفي حكومي</option>
				<option value="3">كاسب</option>
				<option value="4">اخرى</option>
			</select>
			<div class="error" id="errorjob"></div>
	    </div>
	    <div class="field column">
			<label>التحصيل الدارسي</label>
			<select name="study" onchange="chk_select(this, 'errorstudy')">
				<option value="0" selected>اختر</option>

				<option value="1">دراسة جامعية</option>
				<option value="2">معهد او اعدادية</option>
				<option value="3">متوسطة</option>
				<option value="4">ابتدائية</option>
			</select>
			<div class="error" id="errorstudy"></div>
	    </div>
	</div>
</article>

<div class="columns">
	<div class="column">
		<article class="panel is-success" style="background: #fff; height: 100%">
		  <p class="panel-heading">
		      معلومات المستمسكات 
		  </p>
			<div class="field is-horizontal">
			    <div class="field column">
					<label>نوع الهوية</label>
					<select id="idt" name="idt" onchange="chk_select(this, 'erroridt'); selId(this.value);">
						<option value="1" selected>بطاقة وطنية</option>
						<option value="2">هوية الأحوال المدنية</option>
					</select>
					<div class="error" id="erroridt"></div>
			    </div>
			    <div class="field column" id="idt1">
					<label>رقم البطاقة الوطنية</label>
					<input type="text" name="idNum" id="idNum" onchange="chk_idsec(this, 'error8', 1, 30)" />
					<div class="error" id="error8"></div>
			    </div>
			    <div class="field column" id="idt2" style="display: none;">
					<label>رقم الهوية</label>
					<input type="text" name="id2Num" id="id2Num" onchange="chk_idsec(this, 'error9', 1, 30)" />
					<div class="error" id="error9"></div>
			    </div>
			    <div class="field column" id="idt2sec" style="display: none;">
					<label>رقم السجل</label>
					<input type="text" name="id2Numsec" id="id2Numsec" onchange="chk_idsec(this, 'error9sec', 1, 30)" />
					<div class="error" id="error9sec"></div>
			    </div>
			    <div class="field column" id="idt2sec2" style="display: none;">
					<label>رقم الصحيفة</label>
					<input type="text" name="id2Numsec2" id="id2Numsec2" onchange="chk_idsec(this, 'error9sec2', 1, 30)" />
					<div class="error" id="error9sec2"></div>
			    </div>
			</div>

			<div class="field is-horizontal">
			    <div class="field column">
					<label>رقم البطاقة التموينية</label>
					<input type="text" name="tmNum" onchange="chk_num(this, 'error10', 1, 11)" />
					<div class="error" id="error10"></div>
			    </div>
			    <div class="field column">
					<label>اسم المركز التمويني</label>
					<input type="text" name="mrkzName" onchange="chk_text(this, 'error11', 1, 20)" />
					<div class="error" id="error11"></div>
			    </div>
			    <div class="field column">
					<label>رقم المركز التمويني</label>
					<input type="text" name="mrkzNum" onchange="chk_num(this, 'error12', 1, 30)" />
					<div class="error" id="error12"></div>
			    </div>
			</div>
		</article>
	</div>
	<div class="column">
		<article class="panel is-warning" style="background: #fff; height: 100%">
		  <p class="panel-heading">
		      معلومات السكن 
		  </p>
			<div class="field is-horizontal">
			    <div class="field column">
					<label>نوع السكن</label>
					<select name="liv" id="livtype" onchange="chk_select(this, 'errorliv'); selAddr();">
						<option value="0" selected>اختر</option>

						<option value="1">ملك</option>
						<option value="2">ايجار</option>
						<option value="3">عشوائيات</option>
					</select>
					<div class="error" id="errorliv"></div>
			    </div>
			    <div class="field column" id="addr1">
					<label>محلة</label>
					<input type="text" name="add3Num" id="addr1v" onchange="chk_num(this, 'error133', 1, 10)" />
					<div class="error" id="error133"></div>
			    </div>
			    <div class="field column" id="addr2">
					<label>زقاق</label>
					<input type="text" name="addNum" id="addr2v" onchange="chk_num(this, 'error13', 1, 10)" />
					<div class="error" id="error13"></div>
			    </div>
			    <div class="field column" id="addr3">
					<label>دار</label>
					<input type="text" name="add2Num" id="addr3v" onchange="chk_num(this, 'error14', 1, 10)" />
					<div class="error" id="error14"></div>
			    </div>
			    <div class="field column">
					<label>المحافظة</label>
					<select name="moh" onchange="chk_select(this, 'errormoh')">
						<option value="0" selected>اختر</option>
						<?php
						$moh = array('', 'بغداد', 'اربيل', 'الانبار', 'بابل', 'دهوك', 'كربلاء', 'البصره', 'السليمانية', 'واسط', 'نينوى', 'كركوك', 'النجف', 'ديالى', 'صلاح الدين', 'ميسان', 'الديوانية', 'المثنى', 'ذي قار');
						for ($i=1; $i < count($moh); $i++) { 
						?>
						<option value="<?php echo $i ?>"><?php echo $moh[$i] ?></option>
						<?php
						}
						?>

					</select>
					<div class="error" id="errormoh"></div>
			    </div>
			</div>

			<div class="field is-horizontal">
			    <div class="field column">
					<label>اسم المختار</label>
					<input type="text" name="addName" onchange="chk_text(this, 'error15', 1, 20)" />
					<div class="error" id="error15"></div>
			    </div>
			    <div class="field column">
					<label>رقم هاتف المختار</label>
					<input type="text" name="addPhone" onchange="chk_num(this, 'error16', 1, 11)" placeholder="07xxxxxxxxx" />
					<div class="error" id="error16"></div>
			    </div>
			</div>
		</article>
	</div>
</div>




<div class="htitle" id="memsel">
	<h3>استمارة افراد الأسرة</h3>
	<h2>عدد الافراد</h2>
	<select name="members" id="membersnum" onchange="setMembers(this)" style="width: 120px; margin-top: 10px; margin-bottom: 10px">
		<option value="0" selected>0</option>
		<?php
		for ($i=1; $i < 21; $i++) { 
		?>
		<option value="<?php echo $i ?>"><?php echo $i ?></option>
		<?php
		}
		?>
	</select>
</div>


<div id="members"></div>

<input type="hidden" name="memdata" id="memdata" onchange="console.log('added')">
<input type="hidden" name="token" value="<?php echo $uid; ?>" id="memdata" onchange="console.log('added')">

<div class="submit_div">
	<input type="submit" value="ارسال">
</div>

</form>
</div>



<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCKdyTDRyKMzRodnO2Cv-SUuxoulQdTWl8",
    authDomain: "formproj.firebaseapp.com",
    databaseURL: "https://formproj.firebaseio.com",
    projectId: "formproj",
    storageBucket: "formproj.appspot.com",
    messagingSenderId: "763466766999",
    appId: "1:763466766999:web:411882226e82a2917767d2",
    measurementId: "G-3WKKVDS889"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
  <script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-auth.js"></script>

	<script src="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth__ar.js"></script>

<script type="text/javascript">


		function authOut() {
			firebase.auth().signOut().then(function() {
			  console.log("auth out");
			}, function(error) {
			  console.log(error);
			});
		}

		var unsubscribe = null;

      initApp = function() {
      	var getauth = "<?php if(isset($_GET['auth'])){echo $_GET['auth'];}else{echo "false";}; ?>";
        if(getauth != "true"){
          	window.location = 'index.php?err=1';
        }
        unsubscribe = firebase.auth().onAuthStateChanged(function(user) {
          if (user) {
			document.querySelector('#loading').className = 'pageloader';
          } else {
          	window.location = 'index.php?err=1';
          }
        }, function(error) {
          	window.location = 'index.php?err=2';
        });
      };

      window.addEventListener('load', function() {
        initApp();
      });

document.getElementById("formElm").reset();
var msg1 = 'ادخال خاطئ';
var msg2 = 'رقم خاطئ';
var msg3 = 'يجب ادخال رقم هوية الاحوال او البطاقة الوطنية';

var submitAll = true;

function chooseNo() {
	document.querySelector('#first').style.display = 'none';
	document.querySelector('#phoneauth').style.display = 'flex';
}

function chk_text(elm, error_elm, min, max) {
	var value = elm.value;
	var error_elm = document.getElementById(error_elm);
	//var reg = /^([[\u0600-\u065F\u066E-\u06FFA-Za-z]){1,15}$/;
	var reg = new RegExp("^([[\\u0600-\\u065F\\u066E-\\u06FFA-Za-z ]){"+min+","+max+"}$","g");
	if (reg.test(value)) {
		error_elm.innerHTML = '';
		if(submitAll != false){
			submitAll = true;
		}
		//error_elm.style.display = 'none';
	}else{
		error_elm.innerHTML = msg1;
		submitAll = false;
		//error_elm.style.display = 'block';
	}
}

function chk_num(elm, error_elm, min, max, err = false) {
	var value = elm.value;
	value = value.replace(/١/g, '1').replace(/٢/g, '2').replace(/٣/g, '3').replace(/٤/g, '4').replace(/٥/g, '5').replace(/٦/g, '6').replace(/٧/g, '7').replace(/٨/g, '8').replace(/٩/g, '9').replace(/٠/g, '0');
	elm.value = value;
	var error_elm = document.getElementById(error_elm);
	//var reg = /^([0-9]){1,15}$/;
	var reg = new RegExp("^([[0-9]){"+min+","+max+"}$","g");
	if (reg.test(value)) {
		error_elm.innerHTML = '';
		if(submitAll != false){
			submitAll = true;
		}
		//error_elm.style.display = 'none';
	}else{
		if(err == false){
			error_elm.innerHTML = msg2;
		}else{
			error_elm.innerHTML = msg3;
		}
		submitAll = false;
		//error_elm.style.display = 'block';
	}
}

function chk_id(elm, error_elm, min, max) {
	var idelm = document.getElementById("idNum");
	var id2elm = document.getElementById("id2Num");
	if(idelm.value != ''){
		chk_num(idelm, 'error8', min, max, true);
	}else{
		chk_num(id2elm, 'error9', min, max, true);
	}
}

function chk_idsec(elm, error_elm, min, max, m='') {
	var idelm = document.getElementById("idNum"+m);
	var id2elm = document.getElementById("id2Num"+m);
	var id2Numsec = document.getElementById("id2Numsec"+m);
	var id2Numsec2 = document.getElementById("id2Numsec2"+m);

	var idt = document.getElementById("idt"+m).value;
	if(idt == 1){
		chk_num(idelm, 'error8'+m, min, max);
	}else{
		chk_num(id2elm, 'error9'+m, min, max);
		chk_num(id2Numsec, 'error9sec'+m, min, max);
		chk_num(id2Numsec2, 'error9sec2'+m, min, max);
	}
}

function chk_select(elm, error_elm) {
	var value = elm.value;
	var error_elm = document.getElementById(error_elm);

	if (value != 0) {
		error_elm.innerHTML = '';
		if(submitAll != false){
			submitAll = true;
		}
		//error_elm.style.display = 'none';
	}else{
		error_elm.innerHTML = msg1;
		submitAll = false;
		//error_elm.style.display = 'block';
	}
}

function submitForm() {

	submitAll = true;

	var inputs = document.querySelectorAll('input[type=text]');
	var selects = document.querySelectorAll('select');
	var members = document.getElementById("membersnum").value;
	var memData = [];

	for (var i = 0; i < inputs.length; i++) {
		inputs[i].onchange();
	}
	for (var i = 0; i < selects.length; i++) {
		if(selects[i].id != 'membersnum'){
			selects[i].onchange();
		}
	}

	if(submitAll == true){
		document.querySelector('#loading').className = 'pageloader is-active is-link';

		if(members > 0){
			for (var i = 1; i <= members; i++) {
				memData.push(JSON.parse(`{
					"mname": "${document.querySelector("input[name=mname"+i+"]").value}",
					"mfName": "${document.querySelector("input[name=mfName"+i+"]").value}",
					"mg1Name": "${document.querySelector("input[name=mg1Name"+i+"]").value}",
					"mg2Name": "${document.querySelector("input[name=mg2Name"+i+"]").value}",
					"mbdday": "${document.querySelector("select[name=mbdday"+i+"]").value}",
					"mbdmonth": "${document.querySelector("select[name=mbdmonth"+i+"]").value}",
					"mbdyear": "${document.querySelector("select[name=mbdyear"+i+"]").value}",
					"mjob": "${document.querySelector("select[name=mjob"+i+"]").value}",
					"mstudy": "${document.querySelector("select[name=mstudy"+i+"]").value}",
					"mgender": "${document.querySelector("select[name=mgender"+i+"]").value}",
					"midt": "${document.querySelector("select[name=idtm"+i+"]").value}",
					"midNum": "${document.querySelector("input[name=idNumm"+i+"]").value}",
					"mid2Num": "${document.querySelector("input[name=id2Numm"+i+"]").value}",
					"mid2Numsec": "${document.querySelector("input[name=id2Numsecm"+i+"]").value}",
					"mid2Numsec2": "${document.querySelector("input[name=id2Numsecm"+i+"]").value}"
				}`));
			}
		}

		if(memdata.length != 0){
			document.getElementById('memdata').value = JSON.stringify(memData);
		}else{
			document.getElementById('memdata').value = '0';
		}
		console.log(document.getElementById('memdata').value);
		document.getElementById("members").innerHTML = '';

		var user = firebase.auth().currentUser;
		if(user){
			document.getElementById("phone").value = '0'+user.phoneNumber.replace('+964', '0');
			var idt = document.getElementById("idt").value;
			if(idt == 1){
				document.getElementById("id2Num").value = '0';
				document.getElementById("id2Numsec").value = '0';
				document.getElementById("id2Numsec2").value = '0';
			}else{
				document.getElementById("idNum").value = '0';
			}
			selAddr();
	        unsubscribe();

			authOut();

			document.getElementById("formElm").submit();
		}
	}

	return false;
}

function setMembers() {
	var members = document.getElementById("membersnum").value;
	var elm = document.getElementById("members");
	var inhtml = '';

	var days = '';
	for (var i = 1; i < 32; i++) {
		days += '<option value="'+i+'">'+i+'</option>';
	}
	var months = '';
	for (var i = 1; i < 13; i++) {
		months += '<option value="'+i+'">'+i+'</option>';
	}
	var years = '';
	for (var i = 1930; i < 2021; i++) {
		years += '<option value="'+i+'">'+i+'</option>';
	}

	for (var i = 1; i <= members; i++) {
		inhtml += `
<article class="panel is-info" style="background: #fff; height: 100%">
  <p class="panel-heading">
      الفرد رقم ${i}  
  </p>
<h2 style="margin-top: 20px">الاسم الرباعي حسب البطاقة التموينية</h2>
<div class="field is-horizontal">
    <div class="field column">
		<label>الاسم الاول</label>
		<input type="text" name="mname${i}" onchange="chk_text(this, 'error1l${i}', 1, 20)" />
		<div class="error" id="error1l${i}"></div>
    </div>
    <div class="field column">
		<label>الاسم الثاني</label>
		<input type="text" name="mfName${i}" onchange="chk_text(this, 'error2l${i}', 1, 20)" />
		<div class="error" id="error2l${i}"></div>
    </div>
    <div class="field column">
		<label>الاسم الثالث</label>
		<input type="text" name="mg1Name${i}" onchange="chk_text(this, 'error3l${i}', 1, 20)" />
		<div class="error" id="error3l${i}"></div>
    </div>
    <div class="field column">
		<label>الاسم الرابع</label>
		<input type="text" name="mg2Name${i}" onchange="chk_text(this, 'error4l${i}', 1, 20)" />
		<div class="error" id="error4l${i}"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
		<label>الجنس</label>
		<select name="mgender${i}" onchange="chk_select(this, 'errorgl${i}')">
			<option value="0" selected>اختر</option>
			<option value="1">ذكر</option>
			<option value="2">انثى</option>
		</select>
		<div class="error" id="errorgl${i}"></div>
    </div>
    <div class="field column">
		<label>التولد</label>
		<select name="mbdday${i}" onchange="chk_select(this, 'errorbd5l${i}')">
			<option value="0" selected>يوم</option>
			${days}
		</select>
    </div>
    <div class="field column">
		<label style="opacity: 0;">.</label>
		<select name="mbdmonth${i}" onchange="chk_select(this, 'errorbd5l${i}')">
			<option value="0" selected>شهر</option>
			${months}
		</select>
    </div>
    <div class="field column">
		<label style="opacity: 0;">.</label>
		<select name="mbdyear${i}" onchange="chk_select(this, 'errorbd5l${i}')">
			<option value="0" selected>سنة</option>
			${years}
		</select>
		<div class="error" id="errorbd5l${i}"></div>
    </div>
</div>


<div class="field is-horizontal">
    <div class="field column">
		<label>نوع الهوية</label>
		<select id="idtm${i}" name="idtm${i}" onchange="chk_select(this, 'erroridt${i}'); selId(this.value, 'm${i}');">
			<option value="1" selected>بطاقة وطنية</option>
			<option value="2">هوية الأحوال المدنية</option>
		</select>
		<div class="error" id="erroridt${i}"></div>
    </div>

			    <div class="field column" id="idt1m${i}">
					<label>رقم البطاقة الوطنية</label>
					<input type="text" name="idNumm${i}" id="idNumm${i}" onchange="chk_idsec(this, 'error8m${i}', 1, 30, 'm${i}')" />
					<div class="error" id="error8m${i}"></div>
			    </div>
			    <div class="field column" id="idt2m${i}" style="display: none;">
					<label>رقم الهوية</label>
					<input type="text" name="id2Numm${i}" id="id2Numm${i}" onchange="chk_idsec(this, 'error9m${i}', 1, 30, 'm${i}')" />
					<div class="error" id="error9m${i}"></div>
			    </div>
			    <div class="field column" id="idt2secm${i}" style="display: none;">
					<label>رقم السجل</label>
					<input type="text" name="id2Numsecm${i}" id="id2Numsecm${i}" onchange="chk_idsec(this, 'error9secm${i}', 1, 30, 'm${i}')" />
					<div class="error" id="error9secm${i}"></div>
			    </div>
			    <div class="field column" id="idt2sec2m${i}" style="display: none;">
					<label>رقم الصحيفة</label>
					<input type="text" name="id2Numsec2m${i}" id="id2Numsec2m${i}" onchange="chk_idsec(this, 'error9sec2m${i}', 1, 30, 'm${i}')" />
					<div class="error" id="error9sec2m${i}"></div>
			    </div>

    <div class="field column">
		<label>المهنة</label>
		<select name="mjob${i}" onchange="chk_select(this, 'errorjob6l${i}')">
			<option value="0" selected>اختر</option>

			<option value="1">طالب</option>
			<option value="2">موظفي حكومي</option>
			<option value="3">كاسب</option>
			<option value="4">اخرى</option>
		</select>
		<div class="error" id="errorjob6l${i}"></div>
    </div>
    <div class="field column">
		<label>التحصيل الدراسي</label>
		<select name="mstudy${i}" onchange="chk_select(this, 'errorstudy7l${i}')">
			<option value="0" selected>اختر</option>

			<option value="1">دراسة جامعية</option>
			<option value="2">معهد او اعدادية</option>
			<option value="3">متوسطة</option>
			<option value="4">ابتدائية</option>
		</select>
		<div class="error" id="errorstudy7l${i}"></div>
    </div>
</div>

</article>

		`;
	}

	elm.innerHTML = inhtml;
}

function selId(id, m='') {
	if(id == 1){
		document.getElementById("idt1"+m).style.display = 'block';
		document.getElementById("idt2"+m).style.display = 'none';
		document.getElementById("idt2sec"+m).style.display = 'none';
		document.getElementById("idt2sec2"+m).style.display = 'none';
	}else{
		document.getElementById("idt2"+m).style.display = 'block';
		document.getElementById("idt1"+m).style.display = 'none';
		document.getElementById("idt2sec"+m).style.display = 'block';
		document.getElementById("idt2sec2"+m).style.display = 'block';
	}
}

function selAddr() {
	var adr = document.getElementById("livtype").value;

	if(adr == 3){
		document.getElementById("addr1v").value = '0';
		document.getElementById("addr2v").value = '0';
		document.getElementById("addr3v").value = '0';

		document.getElementById("addr1").style.display = 'none';
		document.getElementById("addr2").style.display = 'none';
		document.getElementById("addr3").style.display = 'none';
	}else{

		document.getElementById("addr1").style.display = 'block';
		document.getElementById("addr2").style.display = 'block';
		document.getElementById("addr3").style.display = 'block';
	}
}

</script>
</body>
</html>