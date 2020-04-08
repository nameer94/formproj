<?php
include '../php/dbconnect.php';
session_start();

if (!isset($_SESSION['admin'])) {
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<head>
	<title>لوحة التحكم</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="css/maina.css">
</head>
<body>

	<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ - لوحة التحكم</div>
	<img src="../css/logo.png" />

<section class="section">
	<div class="container">
		<div class="columns">

		  <div class="column is-12">
		  	<?php
		  	$nums_qry = $conn->query("SELECT COUNT(*) AS num FROM forms");
		  	$nums_row = $nums_qry->fetch_assoc();
		  	?>
		  	<div class="nums_div">
		  		<div class="nums">عدد الاستمارات <?php echo $nums_row['num'] ?></div>
		  	</div>

		  	<div style="margin-top: 30px;">
				<div class="columns">
					<div class="column is-6">
			  			<article class="panel" style="background: #fff; height: 100%">
						  <p class="panel-heading">
						    بحث
						  </p>
							<div class="admin_div">
								<form method="get" action="report.php">
									<div class="field">
									  <label class="label">الرقم</label>
									  <div class="control">
									    <input class="input" type="text" name="uid">
									  </div>
									</div>
									<div class="control">
										<input type="submit" class="button is-link" value="بحث">
									</div>
								</form>
							</div>
						</article>
					</div>
					<div class="column is-6">
			  			<article class="panel is-primary" style="background: #fff">
						  <p class="panel-heading">
						    المحافضات
						  </p>
							<div class="admin_div">
								<div class="columns">
							  		<div class="column">
										<?php

										$moh = array('', 'بغداد', 'اربيل', 'الانبار', 'بابل', 'دهوك', 'كربلاء', 'البصره', 'السليمانية', 'واسط', 'نينوى', 'كركوك', 'النجف', 'ديالى', 'صلاح الدين', 'ميسان', 'الديوانية', 'المثنى', 'ذي قار');
										for ($i=1; $i < 7; $i++) { 
										$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE moh='$i'");
		  	$nums_row = $moh_qry->fetch_assoc();
										?>
										<div class="filter">
											<div>
												<input type="checkbox" name="moh" value="<?php echo $i ?>">
											</div>
											<div>
												<a href="report.php?moh=<?php echo $i ?>"><div><?php echo $moh[$i] ?> <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
											</div>
										</div>
										<?php
										}
										?>
							  		</div>
							  		<div class="column">
										<?php
										for ($i=7; $i < 13; $i++) { 
										$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE moh='$i'");
		  	$nums_row = $moh_qry->fetch_assoc();
										?>
										<div class="filter">
											<div>
												<input type="checkbox" name="moh" value="<?php echo $i ?>">
											</div>
											<div>
												<a href="report.php?moh=<?php echo $i ?>"><div><?php echo $moh[$i] ?> <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
											</div>
										</div>
										<?php
										}
										?>
							  		</div>
							  		<div class="column">
										<?php
										for ($i=13; $i < 19; $i++) { 
										$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE moh='$i'");
		  	$nums_row = $moh_qry->fetch_assoc();
										?>
										<div class="filter">
											<div>
												<input type="checkbox" name="moh" value="<?php echo $i ?>">
											</div>
											<div>
												<a href="report.php?moh=<?php echo $i ?>"><div><?php echo $moh[$i] ?> <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
											</div>
										</div>
										<?php
										}
										?>
							  		</div>
							  	</div>
							</div>
						</article>
					</div>
				</div>
		  	</div>

		  	<div style="margin-top: 30px;">
				<div class="columns">
					<div class="column is-3">
			  			<article class="panel is-warning" style="background: #fff; height: 100%">
						  <p class="panel-heading">
						      نوع السكن  
						  </p>
							<div class="admin_div">
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE liv=1");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="liv" value="1" onchange="setCheck(this, 'liv')">
									</div>
									<div>
										<a href="report.php?liv=1"><div value="<?php echo $i ?>">ملك <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE liv=2");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="liv" value="2" onchange="setCheck(this, 'liv')">
									</div>
									<div>
										<a href="report.php?liv=2"><div value="<?php echo $i ?>">ايجار <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE liv=3");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="liv" value="3" onchange="setCheck(this, 'liv')">
									</div>
									<div>
										<a href="report.php?liv=3"><div value="<?php echo $i ?>">عشوائيات <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
							</div>
						</article>
					</div>
					<div class="column is-3">
			  			<article class="panel is-success" style="background: #fff; height: 100%">
						  <p class="panel-heading">
						      العمر  
						  </p>
							<div class="admin_div">
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE bdyear<=2001 AND bdyear>=1995");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="cage" value="2519" onchange="setCheck(this, 'cage')">
									</div>
									<div>
										<a href="report.php?age=2519"><div>25-19 <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE bdyear<=1994 AND bdyear>=1985");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="cage" value="3526" onchange="setCheck(this, 'cage')">
									</div>
									<div>
										<a href="report.php?age=3526"><div>35-26 <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE bdyear<=1984");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="cage" value="36" onchange="setCheck(this, 'cage')">
									</div>
									<div>
										<a href="report.php?age=36"><div>36 فما فوق <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
							</div>
						</article>
					</div>
					<div class="column is-3">
			  			<article class="panel is-link" style="background: #fff; height: 100%">
						  <p class="panel-heading">
						    المهنة
						  </p>
							<div class="admin_div">
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE job=1");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="job" value='1' onchange="setCheck(this, 'job')">
									</div>
									<div>
										<a href='report.php?job=1'><div>طالب <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE job=2");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="job" value='2' onchange="setCheck(this, 'job')">
									</div>
									<div>
										<a href='report.php?job=2'><div>موظفي حكومي <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE job=3");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="job" value='3' onchange="setCheck(this, 'job')">
									</div>
									<div>
										<a href='report.php?job=3'><div>كاسب <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE job=4");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="job" value='4' onchange="setCheck(this, 'job')">
									</div>
									<div>
										<a href='report.php?job=4'><div>اخرى <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
							</div>
						</article>
					</div>
					<div class="column is-3">
			  			<article class="panel is-info" style="background: #fff; height: 100%">
						  <p class="panel-heading">
						     التحصيل الدارسي 
						  </p>
							<div class="admin_div">
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE study=1");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="study" value='1' onchange="setCheck(this, 'study')">
									</div>
									<div>
										<a href='report.php?study=1'><div>دراسة جامعية <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE study=2");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="study" value='2' onchange="setCheck(this, 'study')">
									</div>
									<div>
										<a href='report.php?study=2'><div>معهد او اعدادية <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE study=3");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="study" value='3' onchange="setCheck(this, 'study')">
									</div>
									<div>
										<a href='report.php?study=3'><div>متوسطة <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
								<?php
								$moh_qry = $conn->query("SELECT COUNT(*) AS num FROM forms WHERE study=4");
		  	$nums_row = $moh_qry->fetch_assoc();
								?>
								<div class="filter">
									<div>
										<input type="checkbox" name="study" value='4' onchange="setCheck(this, 'study')">
									</div>
									<div>
										<a href='report.php?study=4'><div>ابتدائية <span class="tag is-light"><?php echo $nums_row['num'] ?></span></div></a>
									</div>
								</div>
								
							</div>
						</article>
					</div>
				</div>
			</div>

<div class="submit_div">
	<button onclick="setFilters()">بحث</button>
</div>

			  			<article class="panel is-danger" style="background: #fff; margin-top: 30px">
			  				<button id="moreBtn" onclick="toggleMore()">
						  <p class="panel-heading">
						      بحث متقدم  
						  </p>
			  				</button>
		  	<div class="admin_div" id="more">
<form method="get" action="report.php">



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
			<label>الاسم</label>
			<input type="text" name="name" />
			<div class="error" id="error2"></div>
	    </div>
	    <div class="field column">
			<label>اسم الاب</label>
			<input type="text" name="fName" />
			<div class="error" id="error3"></div>
	    </div>
	    <div class="field column">
			<label>اسم الجد الاول</label>
			<input type="text" name="g1Name" />
			<div class="error" id="error4"></div>
	    </div>
	    <div class="field column">
			<label>اسم الجد الثاني</label>
			<input type="text" name="g2Name" />
			<div class="error" id="error5"></div>
	    </div>
	</div>

	<div class="field is-horizontal">
	    <div class="field column">
			<label>اسم الام</label>
			<input type="text" name="mName" />
			<div class="error" id="error6"></div>
	    </div>
	    <div class="field column">
			<label>رقم الهاتف</label>
			<input type="text" name="phone" placeholder="07xxxxxxxxx" />
			<div class="error" id="error7"></div>
	    </div>
	    <div class="field column">
			<label>التولد</label>
			<select name="bdday">
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
			<select name="bdmonth">
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
			<select name="bdyear">
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
			<select name="job">
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
			<select name="study">
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
					<label>رقم البطاقة الوطنية</label>
					<input type="text" name="idNum" id="idNum" />
					<div class="error" id="error8"></div>
			    </div>
			    <div class="field column">
					<label>هوية الأحوال المدنية</label>
					<input type="text" name="id2Num" id="id2Num" />
					<div class="error" id="error9"></div>
			    </div>
			    <div class="field column">
					<label>رقم البطاقة التموينية</label>
					<input type="text" name="tmNum" />
					<div class="error" id="error10"></div>
			    </div>
			</div>

			<div class="field is-horizontal">
			    <div class="field column">
					<label>اسم المركز</label>
					<input type="text" name="mrkzName" />
					<div class="error" id="error11"></div>
			    </div>
			    <div class="field column">
					<label>رقم المركز التمويني</label>
					<input type="text" name="mrkzNum" />
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
					<label>المحافظة</label>
					<select name="moh">
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
					<label>نوع السكن</label>
					<select name="liv">
						<option value="0" selected>اختر</option>

						<option value="1">ملك</option>
						<option value="2">ايجار</option>
						<option value="3">عشوائيات</option>
					</select>
					<div class="error" id="errorliv"></div>
			    </div>
			    <div class="field column">
					<label>محلة</label>
					<input type="text" name="add3Num" />
					<div class="error" id="error133"></div>
			    </div>
			    <div class="field column">
					<label>زقاق</label>
					<input type="text" name="addNum" />
					<div class="error" id="error13"></div>
			    </div>
			    <div class="field column">
					<label>دار</label>
					<input type="text" name="add2Num" />
					<div class="error" id="error14"></div>
			    </div>
			</div>

			<div class="field is-horizontal">
			    <div class="field column">
					<label>اسم المختار</label>
					<input type="text" name="addName" />
					<div class="error" id="error15"></div>
			    </div>
			    <div class="field column">
					<label>رقم هاتفه</label>
					<input type="text" name="addPhone" placeholder="07xxxxxxxxx" />
					<div class="error" id="error16"></div>
			    </div>
			</div>
		</article>
	</div>
</div>

<div class="submit_div">
	<input type="submit" value="بحث">
</div>

</form>
			</div>
		</article>
		  </div>

		</div>
	</div>
</section>


<script type="text/javascript">
	function setFilters() {
		var moh = '';
		var mohs = document.querySelectorAll("input[type=checkbox][name=moh]");
		for (var i = 0; i < mohs.length; i++) {
			if(mohs[i].checked){
				moh = mohs[i].value;
			}
		}
		var liv = '';
		var livs = document.querySelectorAll("input[type=checkbox][name=liv]");
		for (var i = 0; i < livs.length; i++) {
			if(livs[i].checked){
				liv = livs[i].value;
			}
		}
		var job = '';
		var jobs = document.querySelectorAll("input[type=checkbox][name=job]");
		for (var i = 0; i < jobs.length; i++) {
			if(jobs[i].checked){
				job = jobs[i].value;
			}
		}
		var study = '';
		var studys = document.querySelectorAll("input[type=checkbox][name=study]");
		for (var i = 0; i < studys.length; i++) {
			if(studys[i].checked){
				study = studys[i].value;
			}
		}
		var cage = '';
		var cages = document.querySelectorAll("input[type=checkbox][name=cage]");
		for (var i = 0; i < cages.length; i++) {
			if(cages[i].checked){
				cage = cages[i].value;
			}
		}

		window.location = 'report.php?moh='+moh+'&liv='+liv+'&job='+job+'&study='+study+'&cage='+cage;
	}

	function setCheck(elm, inp) {
		var mohs = document.querySelectorAll("input[type=checkbox][name="+inp+"]");
		for (var i = 0; i < mohs.length; i++) {
			if(mohs[i] != elm){
				mohs[i].checked = false;
			}
		}
	}

	document.getElementById('more').style.display = 'none';
	function toggleMore() {
		var elm = document.getElementById('more');

		if(elm.style.display == 'none'){
			elm.style.display = 'block';
		}else{
			elm.style.display = 'none';
		}
	}
</script>
</body>
</html>