<?php
include '../php/dbconnect.php';
session_start();

if (!isset($_SESSION['admin'])) {
	header("Location:index.php");
}

$perPage = 20;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$startAt = $perPage * ($page - 1);

if(isset($_GET['age'])){

  if($_GET['age'] == 2519){
    $rep_con = "bdyear<=2001 AND bdyear>=1995";
  }
  if($_GET['age'] == 3526){
    $rep_con = "bdyear<=1994 AND bdyear>=1985";
  }
  if($_GET['age'] == 36){
    $rep_con = "bdyear<=1984";
  }

  $query = "SELECT COUNT(*) as total FROM forms WHERE $rep_con";

  $r_qry = $conn->query($query);
  $r = $r_qry->fetch_assoc();

  $totalPages = ceil($r['total'] / $perPage);

  $links = "";
  for ($i = 1; $i <= $totalPages; $i++) {
    $links .= ($i != $page ) 
              ? "<li><a href='report.php?age=$_GET[age]&page=$i' class='pagination-link is-current' aria-label='Page $i' aria-current='page'>$i</a></li>"
              : "<li><a href='report.php?age=$_GET[age]&page=$i' class='pagination-link' aria-label='Page $i'>$i</a></li>";
  }

  $rep_qry = $conn->query("SELECT * FROM forms WHERE $rep_con LIMIT $startAt, $perPage");


}
if(!isset($_GET['age'])){

  $likes = "";
  foreach($_GET as $key => $value) {
    if($key != 'cage' and $key != 'page'){
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

  $query = "SELECT COUNT(*) as total FROM forms WHERE $likes_val";

  $r_qry = $conn->query($query);
  $r = $r_qry->fetch_assoc();

  $totalPages = ceil($r['total'] / $perPage);

  $links = "";
  for ($i = 1; $i <= $totalPages; $i++) {
    $links .= ($i != $page ) 
              ? "<li><a href='$_SERVER[REQUEST_URI]&page=$i' class='pagination-link is-current' aria-label='Page $i' aria-current='page'>$i</a></li>"
              : "<li><a href='$_SERVER[REQUEST_URI]&page=$i' class='pagination-link' aria-label='Page $i'>$i</a></li>";
  }

  $rep_qry = $conn->query("SELECT * FROM forms WHERE $likes_val LIMIT $startAt, $perPage");

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
		  	//$nums_qry = $conn->query("SELECT * FROM forms");
		  	?>
		  	<div class="nums_div">
		  		<div class="nums">عدد الاستمارات <?php echo $r['total'] ?></div>
		  	</div>

		  	<div class="admin_div" style="margin-top: 30px;">

          <nav class="pagination" role="navigation" aria-label="pagination">
            <ul class="pagination-list">
              <?php
              echo $links;
              ?>
            </ul>
          </nav>

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
      <th>عدد الافراد</th>
      <th>الحالة</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	if($rep_qry->num_rows != 0){
      $status = array('في الانتظار', 'تم القبول', 'لم يتم القبول');
  		while ($rows = $rep_qry->fetch_assoc()) {
  	?>
    <tr>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo htmlspecialchars($rows['name'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($rows['fName'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($rows['g1Name'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($rows['g2Name'], ENT_QUOTES, 'UTF-8'); ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>">0<?php echo htmlspecialchars($rows['phone'], ENT_QUOTES, 'UTF-8'); ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo htmlspecialchars($rows['idNum'], ENT_QUOTES, 'UTF-8'); ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo htmlspecialchars($rows['id2Num'], ENT_QUOTES, 'UTF-8'); ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo htmlspecialchars($rows['tmNum'], ENT_QUOTES, 'UTF-8'); ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo htmlspecialchars($rows['bdday'], ENT_QUOTES, 'UTF-8'); ?>/<?php echo $rows['bdmonth']; ?>/<?php echo $rows['bdyear']; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $moh[$rows['moh']]; ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo htmlspecialchars($rows['members'], ENT_QUOTES, 'UTF-8'); ?></a></th>
      <th><a href="form.php?id=<?php echo $rows['id']; ?>"><?php echo $status[$rows['status']]; ?></a></th>
    </tr>
  	<?php
  		}
  	}
  	?>
  </tbody>
</table>
</div>

          <nav class="pagination" role="navigation" aria-label="pagination">
            <ul class="pagination-list">
              <?php
              echo $links;
              ?>
            </ul>
          </nav>
			</div>
		  </div>

		</div>
	</div>
</section>

</body>
</html>