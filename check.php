<?php
include 'php/dbconnect.php';

if(isset($_GET['idnumber'])){
	$id = $conn->real_escape_string($_GET['idnumber']);
	$idstr = str_replace("-","",$id);
	$ch_qry = $conn->query("SELECT status FROM forms WHERE uid='$idstr'");
	$ch_row = $ch_qry->fetch_assoc();
	if($ch_qry->num_rows == 1){
		if($ch_row['status'] == 0){
			$msg = 'في الانتظار';
		}
		if($ch_row['status'] == 1){
			$msg = 'تم القبول';
		}
		if($ch_row['status'] == 2){
			$msg = 'لم يتم القبول';
		}
	}else{
		$msg = 'غير مسجل او رقم خاطئ';
	}
}else{
	header("../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bulma.min.css">
	<link href="https://fonts.googleapis.com/css?family=Almarai&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css?id=<?php echo rand(10000,9999999); ?>">
</head>
<body>

	<div class="first" id="first">
		<div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
		<img src="css/logo.png" />
		<div class="first_div">
			<p style="font-size: 16pt"><?php echo $msg ?></p>
		</div>
	</div>

</body>
</html>