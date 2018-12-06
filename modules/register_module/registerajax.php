<?php
	include "../connection/connection.php";
	$conn = Connection();
	$postdata = json_encode(array($_REQUEST['clgname'] => $_REQUEST), JSON_FORCE_OBJECT);
	$tempdata = json_decode($postdata);
	$query = "SELECT data FROM developer WHERE details = 'requests'";
	$result = mysqli_query($conn, $query);
	$temparray = json_decode($result->fetch_assoc()['data'], true);
	if($temparray!="") {
		$temparray = array_merge($temparray, $tempdata);
		$postdata = json_encode($temparray);
	}
	$query = "UPDATE developer SET data = '".$postdata."' WHERE details='requests'";
	$result = mysqli_query($conn, $query);
	echo "success";
?>