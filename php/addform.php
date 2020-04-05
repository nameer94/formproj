<?php
include 'dbconnect.php';

$feilds = "";
$values = "";
$exist = false;
$error = false;
if(is_numeric($_POST['idNum']) == false AND is_numeric($_POST['id2Num']) == false){
	header("Location: ../index.php");
}
if(is_numeric($_POST['idNum']) == true){
	$id = $conn->real_escape_string($_POST['idNum']);
	$chkid_qry = $conn->query("SELECT id FROM forms WHERE idNum='$id'");
	if($chkid_qry->num_rows > 0){
		//header("Location: ../exist.php");
		$exist = true;
	}
}
if(is_numeric($_POST['id2Num']) == true){
	$id2 = $conn->real_escape_string($_POST['id2Num']);
	$chkid2_qry = $conn->query("SELECT id FROM forms WHERE id2Num='$id2'");
	if($chkid2_qry->num_rows > 0){
		//header("Location: ../exist.php");
		$exist = true;
	}
}

if($exist == false){
	foreach($_POST as $key => $value) {
	    $feilds = $feilds.', '.$conn->real_escape_string($key);
	    if($key == 'idNum' OR $key == 'id2Num'){
	    	if($value == ''){
	    		$values = $values.', 0';
	    	}else{
	    		$values = $values.', '.$conn->real_escape_string($value);
	    	}
	    }else{
		    if(is_numeric($value)){
			    if($value == 0 AND ($key != 'idNum' OR $key != 'id2Num')){
					$error = true;
			    }
		    	$values = $values.', '.$conn->real_escape_string($value);
		    }else{
			    if(strlen($value) == 0){
					$error = true;
			    }
		    	$values = $values.', \''.$conn->real_escape_string($value).'\'';
		    }
	    }
	}

	if($error == false){
		$feilds = substr($feilds, 2).', uid';
		$values = substr($values, 2).', 0';
		$conn->query("INSERT INTO forms($feilds) VALUES($values)");
		$insert = $conn->insert_id;
		$uid = '';
		for ($i=0; $i < 12; $i++) { 
			$uid = $uid.''.rand(0,9);
		}
		$unique =  $insert.''.substr($uid, strlen(strval($insert)));
		$conn->query("UPDATE forms SET uid=$unique WHERE id=$insert");
		if($insert == 0){
			header("Location: ../index.php");
		}else{
			header("Location: ../done.php?id=".$unique);
		}
	}else{
		header("Location: ../index.php");
	}
}else{
	header("Location: ../exist.php");
}
?>