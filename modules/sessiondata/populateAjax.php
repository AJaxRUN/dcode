<?php 
	include "../connection/connection.php";
	$conn = Connection();
	session_start();
	$temp = ($conn->query("SELECT data FROM ".$_SESSION['clgname']." WHERE details = 'detail'"))->fetch_assoc()['data'];
	$_SESSION['status'] = json_decode($temp, true)['status'];
	$temp = ($conn->query("SELECT data FROM ".$_SESSION['clgname']." WHERE details = 'users'"))->fetch_assoc()['data'];
	$_SESSION['alldata'] = json_decode($temp, true)[$_SESSION['empcode']];
	$_SESSION['alldata']['password']="";
	echo json_encode($_SESSION);
?>