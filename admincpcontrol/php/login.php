<?php
include '../../php/dbconnect.php';
session_start();

if (isset($_POST['user']) && isset($_POST['pass'])) {
	if (preg_match('/^([a-zA-Z0-9_.]){1,30}$/', $_POST['user']) && preg_match('/^([a-zA-Z0-9_.]){1,30}$/', $_POST['pass'])) {
		$user = $conn->real_escape_string($_POST['user']);
		$pass = $conn->real_escape_string($_POST['pass']);
		$qry = $conn->query("SELECT * FROM admins");
		$row = $qry->fetch_assoc();
		if ($qry->num_rows == 1 and password_verify($user, $row['user']) and password_verify($pass, $row['pass'])) {
			$_SESSION['admin'] = $user;
			echo "true";
		}else{
			echo "false";
		}
	}else{
		echo "0";
	}
}else{
	header("Location:../../index.php");
}
?>