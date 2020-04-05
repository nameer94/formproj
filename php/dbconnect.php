<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "addform";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	echo "connection error";
}
?>