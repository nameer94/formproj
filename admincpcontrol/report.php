<?php
include '../php/dbconnect.php';
session_start();

if (!isset($_SESSION['admin'])) {
	header("Location:index.php");
}

if(isset($_GET['age'])){

  if($_GET['age'] == 2519){
    $rep_qry = $conn->query("SELECT * FROM forms WHERE bdyear<=2001 AND bdyear>=1995");
  }
  if($_GET['age'] == 3526){
    $rep_qry = $conn->query("SELECT * FROM forms WHERE bdyear<=1994 AND bdyear>=1985");
  }
  if($_GET['age'] == 36){
    $rep_qry = $conn->query("SELECT * FROM forms WHERE bdyear<=1984");
  }

}
if(!isset($_GET['age'])){

  $likes = "";
  foreach($_GET as $key => $value) {
    if($key != 'cage'){
      if(is_numeric($value)){
        $val = $value;
        if($value == 0){
          $val = '\'%\'';
        }
        $likes = $likes.' AND '.$key.' LIKE '.$conn->real_escape_string($val);
      }else{
        $val = $value;
        if(strlen($value) == 0){
          $val = '%';
        }
        $likes = $likes.' AND '.$key.' LIKE \''.$conn->real_escape_string($val).'\'';
      }
    }
  }

  if(isset($_GET['cage'])){

    if($_GET['cage'] == 2519){
      $likes = $likes.' AND dyear<=2001 AND bdyear>=1995';
    }
    if($_GET['cage'] == 3526){
      $likes = $likes.' AND bdyear<=1994 AND bdyear>=1985';
    }
    if($_GET['cage'] == 36){
      $likes = $likes.' AND bdyear<=1984';
    }

  }

  $likes_val = str_replace("\'","'",substr($likes, 5));

  $rep_qry = $conn->query("SELECT * FROM forms WHERE $likes_val");

}

$moh = array('', 'بغداد', 'اربيل', 'الانبار', 'بابل', 'دهوك', 'كربلاء', 'البصره', 'السليمانية', 'واسط', 'نينوى', 'كركوك', 'النجف', 'ديالى', 'صلاح الدين', 'ميسان', 'الديوانية', 'المثنى', 'ذي قار');
$study = array('', 'دراسة جامعية', 'معهد او اعدادية', 'متوسطة', 'ابتدائية');
?>
<!DOCTYPE html>
<html>
<head>
	<title>لوحة التحكم</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

  <div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ - لوحة التحكم</div>
  <img src="../css/logo.png" />

<section class="section">
	<div class="container">
		<div class="columns">

		  <div class="column is-12">
		  	<?php
		  	//$nums_qry = $conn->query("SELECT * FROM forms");
		  	?>
		  	<div class="nums_div">
		  		<div class="nums">عدد الاستمارات <?php echo $rep_qry->num_rows ?></div>
		  	</div>

		  	<div class="admin_div" style="margin-top: 30px;">
		  		<div class="table-container">
<table class="table is-hoverable" style="width: 100%">
  <thead>
    <tr>
      <th>الاسم الرباعي لرب الاسرة</th>
      <th>رقم الهاتف</th>
      <th>رقم البطاقة الوطنية</th>
      <th>هوية الأحوال المدنية</th>
      <th>رقم البطاقة التموينية</th>
      <th>التولد</th>
      <th>المحافظة</th>
      <th>الاسم الرباعي</th>
      <th>التولد</th>
      <th>التحصيل الدارسي</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	if($rep_qry->num_rows != 0){
  		while ($rows = $rep_qry->fetch_assoc()) {
  	?>
    <tr>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?> <?php echo $rows['fName']; ?> <?php echo $rows['g1Name']; ?> <?php echo $rows['g2Name']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['phone']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['idNum']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['id2Num']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['tmNum']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['bdday']; ?>/<?php echo $rows['bdmonth']; ?>/<?php echo $rows['bdyear']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $moh[$rows['moh']]; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['name1']; ?> <?php echo $rows['fName1']; ?> <?php echo $rows['g1Name1']; ?> <?php echo $rows['g2Name1']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['bdday1']; ?>/<?php echo $rows['bdmonth1']; ?>/<?php echo $rows['bdyear1']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $study[$rows['study']]; ?></a></th>
    </tr>
  	<?php
  		}
  	}
  	?>
  </tbody>
</table>
</div>
			</div>
		  </div>

		</div>
	</div>
</section>

</body>
</html>