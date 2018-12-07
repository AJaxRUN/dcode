<?php
	include "../connection/connection.php";
	$conn = Connection();
	$clgname = $_REQUEST['clgname'];
	$query = "SELECT data FROM developer WHERE details = 'requests'";
	$result = mysqli_query($conn, $query);
	$temparray = json_decode($result->fetch_assoc()['data'],true);
	if(array_key_exists($clgname, $temparray))
		echo "failed";
	else
		echo "success";
?>