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
			<p style="font-size: 16pt">تم ارسال الطلب</p>
			<p style="font-size: 16pt">رقمك التعريفي هو</p>
			<div style="font-size: 16pt; direction: ltr;"><?php echo number_format($_GET['id'], 0, ' ', '-') ?></div>
		</div>
	</div>

</body>
</html>