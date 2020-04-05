<!DOCTYPE html>
<html>
<head>
	<title>اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bulma.min.css">
	<link href="https://fonts.googleapis.com/css?family=Almarai&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
	<img src="css/logo.png" />

	<div class="first" id="first">
		<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
		<img src="css/logo.png" />
		<div class="first_div">
			<p>1- ﺷﺮوط اﻟﻤﻨﺤﺔ و ﺗﻌﻬﺪ ﻗﺎﻧﻮﻧﻲ</p>
			<p>2- ﻫﻞ اي ﻣﻦ اﻓﺮاد اﻟﺎﺳﺮة: ﻣﻮﻇﻒ, ﻣﺘﻘﺎﻋﺪ, راﺗﺐ رﻋﺎﻳﺔ اﺟﺘﻤﺎﻋﻴﺔ, راﺗﺐ اﺧﺮ ﻣﻦ اﻟﺤﻜﻮﻣﺔ:</p>
			<div class="radio">
				<button onclick="document.querySelector('#firstyes').style.display = 'flex';">
					<span></span>
					<span>نعم</span>
				</button>
				<button onclick="document.querySelector('#first').style.display = 'none';">
					<span></span>
					<span>لا</span>
				</button>
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

<div class="container">
<form id="formElm" method="post" onsubmit="event.preventDefault(); submitForm();" action="php/addform.php">


<h3>الاسم الرباعي لرب الاسرة</h3>

<div class="field is-horizontal">
    <div class="field column">
		<label>الاسم</label>
		<input type="text" name="name" onchange="chk_text(this, 'error2', 1, 20)" />
		<div class="error" id="error2"></div>
    </div>
    <div class="field column">
		<label>اسم الاب</label>
		<input type="text" name="fName" onchange="chk_text(this, 'error3', 1, 20)" />
		<div class="error" id="error3"></div>
    </div>
    <div class="field column">
		<label>اسم الجد الاول</label>
		<input type="text" name="g1Name" onchange="chk_text(this, 'error4', 1, 20)" />
		<div class="error" id="error4"></div>
    </div>
    <div class="field column">
		<label>اسم الجد الثاني</label>
		<input type="text" name="g2Name" onchange="chk_text(this, 'error5', 1, 20)" />
		<div class="error" id="error5"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
		<label>اسم الام</label>
		<input type="text" name="mName" onchange="chk_text(this, 'error6', 1, 20)" />
		<div class="error" id="error6"></div>
    </div>
    <div class="field column">
		<label>رقم الهاتف</label>
		<input type="text" name="phone" onchange="chk_num(this, 'error7', 1, 11)" placeholder="07xxxxxxxxx" />
		<div class="error" id="error7"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
		<label>رقم البطاقة الوطنية</label>
		<input type="text" name="idNum" id="idNum" onchange="chk_id(this, 'error8', 1, 30)" />
		<div class="error" id="error8"></div>
    </div>
    <div class="field column">
		<label>هوية الأحوال المدنية</label>
		<input type="text" name="id2Num" id="id2Num" onchange="chk_id(this, 'error9', 1, 30)" />
		<div class="error" id="error9"></div>
    </div>
    <div class="field column">
		<label>رقم البطاقة التموينية</label>
		<input type="text" name="tmNum" onchange="chk_num(this, 'error10', 1, 11)" />
		<div class="error" id="error10"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
		<label>اسم المركز</label>
		<input type="text" name="mrkzName" onchange="chk_text(this, 'error11', 1, 20)" />
		<div class="error" id="error11"></div>
    </div>
    <div class="field column">
		<label>رقم المركز التمويني</label>
		<input type="text" name="mrkzNum" onchange="chk_num(this, 'error12', 1, 30)" />
		<div class="error" id="error12"></div>
    </div>
</div>

<div class="field is-horizontal">
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
    </div>
</div>
<div class="error" id="errorbd"></div>

<div class="field is-horizontal">
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
    <div class="field column">
		<label>زقاق</label>
		<input type="text" name="addNum" onchange="chk_num(this, 'error13', 1, 10)" />
		<div class="error" id="error13"></div>
    </div>
    <div class="field column">
		<label>دار</label>
		<input type="text" name="add2Num" onchange="chk_num(this, 'error14', 1, 10)" />
		<div class="error" id="error14"></div>
    </div>
    <div class="field column">
		<label>نوع السكن</label>
		<select name="liv" onchange="chk_select(this, 'errorliv')">
			<option value="0" selected>اختر</option>

			<option value="1">ملك</option>
			<option value="2">ايجار</option>
			<option value="3">عشوائيات</option>
		</select>
		<div class="error" id="errorliv"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
		<label>اسم المختار</label>
		<input type="text" name="addName" onchange="chk_text(this, 'error15', 1, 20)" />
		<div class="error" id="error15"></div>
    </div>
    <div class="field column">
		<label>رقم هاتفه</label>
		<input type="text" name="addPhone" onchange="chk_num(this, 'error16', 1, 11)" placeholder="07xxxxxxxxx" />
		<div class="error" id="error16"></div>
    </div>
</div>

<h3>استمارة افراد العائلة</h3>
<h2>الاسم الرباعي</h2>

<div class="field is-horizontal">
    <div class="field column">
		<label>الاسم</label>
		<input type="text" name="name1" onchange="chk_text(this, 'error17', 1, 20)" />
		<div class="error" id="error17"></div>
    </div>
    <div class="field column">
		<label>اسم الاب</label>
		<input type="text" name="fName1" onchange="chk_text(this, 'error18', 1, 20)" />
		<div class="error" id="error18"></div>
    </div>
    <div class="field column">
		<label>اسم الجد الاول</label>
		<input type="text" name="g1Name1" onchange="chk_text(this, 'error19', 1, 20)" />
		<div class="error" id="error19"></div>
    </div>
    <div class="field column">
		<label>اسم الجد الثاني</label>
		<input type="text" name="g2Name1" onchange="chk_text(this, 'error20', 1, 20)" />
		<div class="error" id="error20"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
		<label>التولد</label>
		<select name="bdday1" onchange="chk_select(this, 'errorbd1')">
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
		<select name="bdmonth1" onchange="chk_select(this, 'errorbd')">
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
		<select name="bdyear1" onchange="chk_select(this, 'errorbd')">
			<option value="0" selected>سنة</option>
			<?php
			for ($i=1930; $i < 2021; $i++) { 
			?>
			<option value="<?php echo $i ?>"><?php echo $i ?></option>
			<?php
			}
			?>
		</select>
    </div>
</div>
<div class="error" id="errorbd1"></div>

<div class="field is-horizontal">
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



<div class="submit_div">
	<input type="submit" value="ارسال">
</div>

</form>
</div>


<script type="text/javascript">
var msg1 = 'ادخال خاطئ';
var msg2 = 'رقم خاطئ';
var msg3 = 'يجب ادخال رقم هوية الاحوال او البطاقة الوطنية';

var submitAll = true;

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
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].onchange();
	}
	for (var i = 0; i < selects.length; i++) {
		selects[i].onchange();
	}

	if(submitAll == true){
		document.getElementById("formElm").submit();
	}

	return false;
}

</script>
</body>
</html>