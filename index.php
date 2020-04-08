<!DOCTYPE html>
<html>
<head>
	<title>اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bulma.min.css">
	<link href="https://fonts.googleapis.com/css?family=Almarai&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css?id=<?php echo rand(10000,9999999); ?>">

	<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth.css" />
</head>
<body>

	<div class="first" id="terms">
		<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
		<img src="css/logo.png" />
		<div class="first_div">

			<?php
			if(isset($_GET['err']) and $_GET['err'] == 1){
			?>
			<div class="notification is-danger is-light">يجب تأكيد الرقم اولا</div>
			<?php } ?>

			<?php
			if(isset($_GET['err']) and $_GET['err'] != 1){
			?>
			<div class="notification is-danger is-light">حدث خطأ يرجى اعادة المحاولة</div>
			<?php } ?>
			
			<p style="padding-left: 10px; margin-right: 10px;">اخلاء مسئولية
<br/>- يقوم الموقع بحفظ كافة المعلومات المدخلة ليتم مراجعتها لاحقا.
<br/>- تأكد من ادخال معلوماتك الصحيحة وفي حالة استخدامك لمعلومات وهميه او معلومات شخصا آخر سيتم محاسبتك قانونيا.
<br/>- يجب مراجعة الموقع والتأكد من قبولك لاحقا.
<br/>- الاستمارات يتم مراجعتها ثم يتم الرد بالقبول او الرفض (في حالة ضهور النتيجة "في الانتضار" فهذا يعني انها لا زالت في مرحلة المراجعة) قد تستغرق مراجعة الطلب من اسبوع الى شهر.
<br/>- سوف يتم التأكد من رقم هاتفك فتأكد من ان رقم هاتفك في الخدمة.
<br/>- يجب ان لا يكون اي من افراد الاسرة: ﻣﻮﻇﻒ, ﻣﺘﻘﺎﻋﺪ, لديه راﺗﺐ رﻋﺎﻳﺔ اﺟﺘﻤﺎﻋﻴﺔ او راﺗﺐ اﺧﺮ ﻣﻦ اﻟﺤﻜﻮﻣﺔ.</p>
		<div class="buttons" style="margin-top: 20px;">
		  <button class="button is-link" onclick="chooseNo()">اوافق</button>
		  <button class="button" style="margin-right: 10px" onclick="document.querySelector('#firstyes').style.display = 'flex';document.querySelector('#terms').style.display = 'none'">رفض</button>
		</div>
		</div>
	</div>

	<div class="first yes" id="firstyes">
		<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
		<img src="css/logo.png" />
		<div class="first_div">
			<p>شكرا</p>
		</div>
	</div>

	<div class="first" id="phoneauth">
		<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
		<img src="css/logo.png" />
		<div class="first_div">
			<p>تأكيد رقم الهاتف</p>
    		<div id="firebaseui-auth-container"></div>
		</div>
	</div>



<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-analytics.js"></script>

  <script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-auth.js"></script>

	<script src="https://www.gstatic.com/firebasejs/ui/4.5.0/firebase-ui-auth__ar.js"></script>

	<script type="text/javascript">
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

      // FirebaseUI config.
      var uiConfig = {
        signInSuccessUrl: 'http://192.168.64.2/form/form.php?auth=true',
        signInOptions: [{
          // Leave the lines as is for the providers you want to offer your users.
          provider: firebase.auth.PhoneAuthProvider.PROVIDER_ID,
      		whitelistedCountries: ['IQ', '+964']
        }],
        // tosUrl and privacyPolicyUrl accept either url string or a callback
        // function.
        // Terms of service url/callback.
        tosUrl: 'http://192.168.64.2/form/',
        // Privacy policy url/callback.
        privacyPolicyUrl: function() {
          window.location.assign('http://192.168.64.2/form/');
        }
      };

	function showTerms() {
		document.querySelector('#first').style.display = 'none';
		document.querySelector('#terms').style.display = 'flex';
	}

	function chooseNo() {
		document.querySelector('#terms').style.display = 'none';
		document.querySelector('#phoneauth').style.display = 'flex';

      	var ui = new firebaseui.auth.AuthUI(firebase.auth());
	    ui.start('#firebaseui-auth-container', uiConfig);
	}

	function chekId() {
		var idnum = document.getElementById("idnumber").value;
		if(idnum.length > 0){
			window.location = 'check.php?idnumber='+idnum;
		}
	}

	</script>
</body>
</html>