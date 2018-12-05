<?php
	require "../connection/connection.php";
	session_start();
	$conn = Connection();
	if(empty($_REQUEST))
		echo "Error";
	else {
		$username = $_REQUEST["username"];
		$password = md5($_REQUEST["password"]);
		$query = "SELECT data FROM developer WHERE details = 'users'";
		$result = mysqli_query($conn, $query);
		$data = json_decode($result->fetch_assoc()['data'], true);
		if(isset($data[$username])&&strtolower($data[$username]['password'])==$password) {
			$_SESSION['login'] = true;
			echo "success";
		}
		else
			echo "failed";

	}	
?>