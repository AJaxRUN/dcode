<?php
	include "../connection/connection.php";
	session_start();
	$conn = Connection();
	if(isset($_REQUEST["clgname"])&&!empty($_REQUEST["clgname"])) {
		$tablename = $_REQUEST["clgname"];
		$_SESSION['admin'] = false;
		$_SESSION['clgname'] = $_REQUEST["clgname"];
	}
	else {
		$tablename = "developer";
		$_SESSION['admin'] = true;
	}
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
					$_SESSION['name'] = $data[$username]['name'];
					$_SESSION['empcode'] =$username;
					// if(isset($_REQUEST["clgname"])&&!empty($_REQUEST["clgname"])) {
					// }
					echo "success";
				}
				else
					echo "failed";
			}
		else
			echo "failed";

	}	
?>