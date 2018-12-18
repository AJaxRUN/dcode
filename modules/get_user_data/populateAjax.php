<?php
	include "../connection/connection.php";
	session_start();
	$conn = Connection();
	$clgname = $_SESSION['clgname'];
	$empcode = $_SESSION['empcode'];
	$result = $conn->query("SELECT data FROM ".$clgname." WHERE details='users'");
	$r = json_decode($result->fetch_assoc()['data'],true); 
	echo $r['empcode']."%%".$r['email']."%%".$r['contactnumber'];
?>