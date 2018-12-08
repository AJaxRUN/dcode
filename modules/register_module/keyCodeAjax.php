<?php
	include "../connection/connection.php";
	$conn = Connection();
	$code = $_REQUEST['code'];
	$query = "SELECT data FROM developer WHERE details = 'keyCode'";
	$result = mysqli_query($conn, $query);
	$data = $result->fetch_assoc()['data'];
	if(strcmp($code,$data)==0)
		echo "success";
	else
		echo "failed";
?>