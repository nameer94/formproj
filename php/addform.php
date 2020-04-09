<?php
session_start();
	include 'dbconnect.php';

	$feilds = "";
	$values = "";
	$exist = false;
	$error = false;
	if(is_numeric($_GET['idNum']) == false AND is_numeric($_GET['id2Num']) == false){
		header("Location: ../index.php?err=2");
	}
	if(is_numeric($_GET['idNum']) == true AND $_GET['idNum'] != 0 AND $_GET['idt'] = 1){
		$id = $conn->real_escape_string($_GET['idNum']);
		$chkid_qry = $conn->query("SELECT id FROM forms WHERE idNum='$id'");
		if($chkid_qry->num_rows > 0){
			$exist = true;
		}
	}
	if(is_numeric($_GET['id2Num']) == true AND $_GET['id2Num'] != 0 AND $_GET['idt'] = 2){
		$id2 = $conn->real_escape_string($_GET['id2Num']);
		$chkid2_qry = $conn->query("SELECT id FROM forms WHERE id2Num='$id2'");
		if($chkid2_qry->num_rows > 0){
			$exist = true;
		}
	}

	if($exist == false){
		foreach($_GET as $key => $value) {
			if($key != 'token'){
			    $feilds = $feilds.', '.$conn->real_escape_string($key);
			    if($key == 'idNum' OR $key == 'id2Num'){
			    	if($value == ''){
			    		$values = $values.', 0';
			    	}else{
			    		$values = $values.', '.$conn->real_escape_string($value);
			    	}
			    }else{
				    if(is_numeric($value)){
					    if($value == 0 AND $key != 'idNum' AND $key != 'id2Num' AND $key != 'id2Numsec' AND $key != 'id2Numsec2' AND $key != 'members' AND $key != 'addNum' AND $key != 'add2Num' AND $key != 'add3Num' AND $key != 'addName' AND $key != 'addPhone'){
							$error = true;
					    }
				    	$values = $values.', '.$conn->real_escape_string($value);
				    }else{
					    if(strlen($value) == 0 AND $key != 'addName' AND $key != 'addPhone'){
							$error = true;
					    }
				    	$values = $values.', \''.$conn->real_escape_string($value).'\'';
				    }
			    }
			}
		}


		if($error == false){
			$feilds = substr($feilds, 2).', uid, dday, dmonth';
			$values = substr($values, 2).', 0, '.date("j").', '.date("n");
			$conn->query("INSERT INTO forms($feilds) VALUES($values)");
			echo "INSERT INTO forms($feilds) VALUES($values)";
			$insert = $conn->insert_id;
			$uid = '';
			for ($i=0; $i < 12; $i++) { 
				$uid = $uid.''.rand(0,9);
			}
			$unique =  $insert.''.substr($uid, strlen(strval($insert)));
			$conn->query("UPDATE forms SET uid=$unique WHERE id=$insert");
			if($insert == 0){
				header("Location: ../index.php?err=2");
			}else{
				session_unset();
				session_destroy(); 
				header("Location: ../done.php?id=".$unique);
			}
		}else{
			header("Location: ../index.php?err=2");
		}
	}else{
		header("Location: ../exist.php");
	}
?>