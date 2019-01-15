<?php 
	include "../connection/connection.php";
	$conn = Connection();
	session_start();
	if(!isset($_SESSION['login'])||($_SESSION['login']==false))
    {
      header('Location:../logout/logout.php?login=failed');
    }
    if(empty($_REQUEST)) {
		echo "Error";
		exit();
	}
	else {
		$username = $_SESSION['empcode'];
		$password = md5($_REQUEST['password']);
		$tablename = $_SESSION['clgname'];
		$query = "SELECT data FROM ".$tablename." WHERE details = 'users'";
		$result = mysqli_query($conn, $query);
		if($result) {
			$data = json_decode($result->fetch_assoc()['data'], true);
				if(isset($data[$username])) {
					$_SESSION['name'] = $data[$username]['name'] = $_REQUEST['name'];
					$data[$username]['password'] = $password;
					$data[$username]['contactnumber'] = $_REQUEST['contact'];
					$data[$username]['email'] = $_REQUEST['email'];
					$query = "UPDATE ".$tablename." SET data ='".json_encode($data)."' WHERE details = 'users'";

					$result = mysqli_query($conn, $query);
					echo "success";
				}
				else
					echo "failed";
			}
		else
			echo "failed";

	}	
?>	