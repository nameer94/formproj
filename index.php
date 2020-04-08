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

			

	<div class="first yes" id="first">
		<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
		<img src="css/logo.png" />
		<div class="first_div">

			<p style="color: #395FAE;">تقديم</p>
			<p style="margin-top: 20px; padding-left: 10px; margin-right: 10px;">ﻫﻞ اي ﻣﻦ اﻓﺮاد اﻟﺎﺳﺮة: ﻣﻮﻇﻒ, ﻣﺘﻘﺎﻋﺪ, راﺗﺐ رﻋﺎﻳﺔ اﺟﺘﻤﺎﻋﻴﺔ, راﺗﺐ اﺧﺮ ﻣﻦ اﻟﺤﻜﻮﻣﺔ:</p>
			<div class="radio">
				<button onclick="document.querySelector('#firstyes').style.display = 'flex';document.querySelector('#first').style.display = 'none'">
					<span></span>
					<span>نعم</span>
				</button>
				<button onclick="showTerms()">
					<span></span>
					<span>لا</span>
				</button>
			</div>

			<p style="margin-top: 20px; color: #395FAE;">او</p>

			    <div class="field" style="margin-top: 20px">
					<label>تحقق من القبول</label>
					<input type="text" id="idnumber" placeholder="الرقم" onchange="console.log('sub')" />
			    </div>
				<div class="submit_div">
					<button onclick="chekId();">تحقق</button>
				</div>
		</div>
	</div>

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

			<p style="padding-left: 10px; margin-right: 10px;">ملاحظات هامة:
<br/>- المنحة مخصصة للأسر التي تمر بظروف مادية صعبة بسبب انتشار الوباء وحظر التجوال وتأثر فرص العمل ، ولا تشمل الفئات التي تستلم رواتب او اي دخل اخر من الحكومة ، ولا تشمل الميسورين.

<br/>- لنتكافل جميعاً: الرجاء عدم التقديم من قبل غير المحتاجين المستحقين للمنحة ، هناك من هو بحاجة ماسة وهو أولى منك. 

<br/>- سوف يتم التأكد من رقم هاتفك ، فتأكد من ان رقم هاتفك يعمل بشكل صحيح. ولا تقدم اكثر من مرة.

<br/>- استعد قبل البدء بعملية التقديم: ستحتاج الى الوثائق الشخصية الثبوتية الخاصة بك وباسرتك والبطاقة التموينية اثناء عملية التقديم.

<br/>- تأكد من ادخال معلوماتك الصحيحة وفي حالة استخدامك لمعلومات وهمية او لمعلومات شخص آخر او اخفاء اية معلومات مطلوبة فستعرض نفسك الى المحاسبة القانونية والعقوبات القضائية. 

<br/>- يقوم الموقع بحفظ كافة المعلومات المدخلة لتتم مراجعتها لاحقا وتدقيقها مع الجهات الحكومية.</p>
			<p style="padding-left: 10px; margin-right: 10px; color: #d43535">- ان قيامك بعملية التقديم يعني تعهدك بقراءة وفهم هذه التعليمات وموافقتك على الشروط والأحكام المتعلقة بالمنحة.</p>
			<p style="padding-left: 10px; margin-right: 10px; color: #d43535">- يجب ان لا يكون اي من افراد الاسرة ممن يستلم راتبا من الحكومة: ﻣﻮﻇﻒ ، او ﻣﺘﻘﺎﻋﺪ ، أو مشمول بشبكة الحماية الاجتماعية، او يستلم اي راﺗﺐ او دخل اﺧﺮ ﻣﻦ اﻟﺤﻜﻮﻣﺔ.</p>
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
			<p>تأكيد رقم الهاتف النقال</p>
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