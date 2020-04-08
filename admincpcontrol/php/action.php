<?php
include '../../php/dbconnect.php';
session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:../index.php");
}

if(isset($_POST['type']) and isset($_POST['id']) and ($_POST['type'] == 0 or $_POST['type'] == 1 or $_POST['type'] == 2)){
	$id = $conn->real_escape_string($_POST['id']);
	$type = $conn->real_escape_string($_POST['type']);

	$conn->query("UPDATE forms SET status='$type' WHERE id='$id'");
	echo $type;
}else{
	echo 'error';
}

?>