<?php 
	include "../connection/connection.php";
	$conn = Connection();
	session_start();
	$temp = ($conn->query("SELECT data FROM ".$_SESSION['clgname']." WHERE details = 'detail'"))->fetch_assoc()['data'];
	$_SESSION['status'] = json_decode($temp, true)['status'];
	echo json_encode($_SESSION);
?>