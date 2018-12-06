<?php
	include "../connection/connection.php";
	$conn = Connection();
	$clgname = $_REQUEST['clgname'];
	$postdatajson = json_encode(array($clgname => $_REQUEST), JSON_FORCE_OBJECT);
	$postdata = json_decode($postdatajson,true);
	$query = "SELECT data FROM developer WHERE details = 'requests'";
	$result = mysqli_query($conn, $query);
	$temparray = json_decode($result->fetch_assoc()['data'],true);
	$postdata[$clgname]['password']=md5($postdata[$clgname]['password']);
	if(!is_null($temparray)) {
		$temparray = array_merge($temparray, $postdata);
		$postdatajson = json_encode($temparray);
		$query = "UPDATE developer SET data = '".$postdatajson."' WHERE details='requests'";
		$result = mysqli_query($conn, $query);
		echo "success";
	}
	else
		echo "failed";
?>