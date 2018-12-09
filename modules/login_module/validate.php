<?php
	include "../connection/connection.php";
	session_start();
	$conn = Connection();
	if(isset($_REQUEST["clgname"])&&!empty($_REQUEST["clgname"]))
		$tablename = $_REQUEST["clgname"];
	else
		$tablename = "developer";
	if(empty($_REQUEST)) {
		echo "Error";
		exit();
	}
	else {
		$username = $_REQUEST["username"];
		$password = md5($_REQUEST['password']);
		$query = "SELECT data FROM ".$tablename." WHERE details = 'users'";
		$result = mysqli_query($conn, $query);
		if($result) {
			$data = json_decode($result->fetch_assoc()['data'], true);
				if(isset($data[$username])&&strtolower($data[$username]['password'])==$password) {
					$_SESSION['login'] = true;
					echo "success";
				}
				else
					echo "failed";
			}
		else
			echo "failed";

	}	
?>